<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;

/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\ShippingAddress;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use Redirect;
use Session;
use URL;
use DB;

class PaymentController extends Controller
{
    public function __construct()
    {
/** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    public function payWithpaypal(Request $request)
    {
        $customer_id = Session::get('customer_id');
       
        $data = DB::table('bill_detail')->join('bills','bill_detail.id_bill' , '=' , 'bills.id')
                                        ->join('products','bill_detail.id_product' , '=' , 'products.id')
                                        ->where('bills.id_customer' , $customer_id)->where('bills.id_status' , 1)
                                        
                                        ->select('products.name_en',DB::raw('sum(bill_detail.quantity) as quantity'),DB::raw('max(bill_detail.unit_price) as unit_price'))
                                        ->groupBy('products.name_en')
                                        
                                        ->get();

        // $total = Bill::where('id_customer' ,'=', $customer_id)->value('total');

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        
        $total = 0;
        $i = 0;
        
        
        foreach($data as $unpaid)
            {
                $items[$i] = new Item();
                //change currency vnd to usd /23000.0
                $unpaid->unit_price = number_format($unpaid->unit_price/23000,2);
                $items[$i]->setQuantity($unpaid->quantity)
                            ->setName($unpaid->name_en)
                            ->setPrice($unpaid->unit_price)
                            ->setCurrency('USD'); 
                $i++;
                $total +=  $unpaid->quantity*$unpaid->unit_price;
            }
        
        
        
 
        $item_list = new ItemList();
        $item_list->setItems($items);

        // $shippingAddress = new ShippingAddress();
        // $shippingAddress->setRecipientName("Brian Robinson")
        //     ->setLine1("4th Floor")
        //     ->setLine2("Unit #34")
        //     ->setCity("San Jose")//
        //     ->setCountryCode("US")
        //     ->setPostalCode("95131")//
        //     ->setPhone("2025550110")
        //     ->setState("CA");//
 
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($total);
 
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
 
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL('status')) /** Specify return URL **/
            ->setCancelUrl(URL('status'));
 
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            
            $payment->create($this->_api_context);
 
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            echo $ex->getCode(); // Prints the Error Code
            echo $ex->getData(); // Prints the detailed error message 
            die($ex);
            // if (\Config::get('app.debug')) {
 
            //     \Session::put('error', 'Connection timeout');
            //     return Redirect::route('paywithpaypal');
 
            // } else {
 
            //     \Session::put('error', 'Some error occur, sorry for inconvenient');
            //     return Redirect::route('paywithpaypal');
 
            // }
 
        }
 
        foreach ($payment->getLinks() as $link) {
 
            if ($link->getRel() == 'approval_url') {
 
                $redirect_url = $link->getHref();
                break;
 
            }
 
        }
 
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());
 
        if (isset($redirect_url)) {
 
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
 
        }
 
        \Session::put('error', 'Unknown error occurred');
        return Redirect::route('payment');
 
    }
    public function getPaymentStatus()
    {
        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');
        $customer_id = Session::get('customer_id');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
 
            \Session::put('error', 'Payment failed');
            return Redirect::route('payment');
 
        }
 
        $payment = Payment::get($payment_id, $this->_api_context);
        
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
 
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
 
        if ($result->getState() == 'approved') {
 
            \Session::put('success', 'Payment success');

            /**change bill status **/
            Bill::where('id_customer' , $customer_id)->update(['id_status' => 4]);
            return Redirect::route('payment');
 
        }
 
        \Session::put('error', 'Payment failed');
        return Redirect::route('payment');
 
    }
}

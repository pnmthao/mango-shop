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
use App\Product;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\Coupon;
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
        $check_coupon = DB::table('bills')->where('bills.id_customer' , $customer_id)->where('bills.id_status' , 1)->where('bills.payment','prepay')
                                        ->value('bills.id_coupon');
        
        if($check_coupon == ''){
            $data = DB::table('bill_detail')->join('bills','bill_detail.id_bill' , '=' , 'bills.id')
                                        ->join('products','bill_detail.id_product' , '=' , 'products.id')
                                        ->where('bills.id_customer' , $customer_id)->where('bills.id_status' , 1)->where('bills.payment','prepay')
                                        ->select('products.name_en',DB::raw('sum(bill_detail.quantity) as quantity'),DB::raw('max(bill_detail.unit_price) as unit_price'),DB::raw('max(products.promotion_price) as promotion_price'))
                                        ->groupBy('products.name_en')
                                        ->get();
           
        }
         else{
            $data = DB::table('bill_detail')->join('bills','bill_detail.id_bill' , '=' , 'bills.id')
                                            ->join('products','bill_detail.id_product' , '=' , 'products.id')
                                            ->join('coupons','bills.id_coupon', '=', 'coupons.id')
                                            ->where('bills.id_customer' , $customer_id)->where('bills.id_status' , 1)->where('bills.payment','prepay')
                                            ->select('products.name_en','coupons.code','coupons.value',DB::raw('sum(bill_detail.quantity) as quantity'),DB::raw('max(bill_detail.unit_price) as unit_price'),DB::raw('max(products.promotion_price) as promotion_price'))
                                            ->groupBy('products.name_en','coupons.code','coupons.value')
                                            ->get();
        
         }
        // $total = Bill::where('id_customer' ,'=', $customer_id)->value('total');

        
        
        $total = 0;
        $i = 0;
        
        
        foreach($data as $unpaid)
            {
                $items[$i] = new Item();
                //change currency vnd to usd /23000.0
                if($unpaid->promotion_price)$unpaid->unit_price = $unpaid->promotion_price;
                $unpaid->unit_price = number_format($unpaid->unit_price/23000,2);
                $items[$i]->setQuantity($unpaid->quantity)
                            ->setName($unpaid->name_en)
                            ->setPrice($unpaid->unit_price)
                            ->setCurrency('USD'); 
                $i++;
                $total +=  $unpaid->quantity*$unpaid->unit_price;
            }

        if(isset($unpaid->value)){
                $unpaid->value = number_format($unpaid->value/23000,2);
                $items[$i] = new Item();
                $items[$i]->setQuantity(1)
                            ->setName($unpaid->code)
                            ->setPrice(0-$unpaid->value)
                            ->setCurrency('USD'); 
                $total +=  0-$unpaid->value;
        }



        
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        
 
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
            if (\Config::get('app.debug')) {
 
                \Session::put('error', 'Connection timeout');
                return Redirect::route('payment');
 
            } else {
 
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('payment');
 
            }
 
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
            Bill::where('id_customer' , $customer_id)->where('payment','=','prepay')->update(['id_status' => 4]);
            return Redirect::route('payment');
 
        }
 
        \Session::put('error', 'Payment failed');
        return Redirect::route('payment');
 
    }

    public function postPrepay(Request $req)
    {
        $bill = new Bill;
        $bill->id_customer = Session::get('customer_id');
        $bill->date_order = date('Y-m-d');
        $bill->total = $req->total;
        $bill->payment = 'prepay';
        $bill->id_coupon = $req->id_coupon;
        // $bill->note = $req->notes;
        $bill->save();

        $items = json_decode($req->items, true);
        foreach ($items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_unit = $value['item_unit'];
            $bill_detail->id_product = $value['item_id'];
            $bill_detail->quantity = $value['quantity'];
            $bill_detail->unit_price = $value['unit_price'];
            $bill_detail->save();
            $quantity_instock = Product::where('id','=',$value['item_id'])->value('quantity_left');
            $quantity_left = bcsub($quantity_instock , $value['quantity']);
            Product::where('id','=',$value['item_id'])->update(['quantity_left'=>$quantity_left]);

        }


        return view('page.payment');
    }
}

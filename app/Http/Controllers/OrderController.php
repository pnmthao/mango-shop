<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
Session_start();
class OrderController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect('dashboard');
        }else{
            return Redirect('admin')->send();
        }
    }
    public function all_order(){
        $this->AuthLogin();
        $itemPerPage = 5;
        $all_order = DB::table('bills')
                    ->join('customers','bills.id_customer','=','customers.id')
                    ->join('status','bills.id_status','=','status.id')
                    ->select('bills.*', 'customers.name as customer_name','status.name as status_name')
                    ->orderby('bills.id','desc')->paginate($itemPerPage);
        $count_order = DB::table('bills')->count();
        $manager_order = view('admin.all_order')
                        ->with('all_order',$all_order)
                        ->with('count_order', $count_order)
                        ->with('itemPerPage', $itemPerPage);
        return view('admin_layout')->with('admin.all_order',$manager_order);
    }
    public function all_order_detail($order_detail_id){
        $this->AuthLogin();
        $bill_status = DB::table('status')->orderby('id','desc')->get();
        $all_order_detail = DB::table('bill_detail')
                        ->where('id_bill', $order_detail_id)
                        ->join('bills','bill_detail.id_bill','=', 'bills.id')
                        ->join('customers','bills.id_customer','=','customers.id')
                        ->join('products','bill_detail.id_product','=','products.id')
                        ->join('status','bills.id_status','=','status.id')
                        ->join('unit','unit.unit_id','=','bill_detail.id_unit')
                        ->select('bill_detail.*', 'customers.name as customer_name', 'products.name as product_name', 'bills.*','status.name as status_name','unit.unit_name as unit_name' )
                        ->get();
        $manager_order_detail = view('admin.all_order_detail')->with('all_order_detail',$all_order_detail)->with('bill_status',$bill_status);
        return view('admin_layout')->with('admin.all_order_detail',$manager_order_detail);
    }
}
<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Coupon;
use Session;
use Illuminate\Http\Request;
use DB;
use Redirect;
Session_start();
class CouponsController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect('dashboard');
        }else{
            return Redirect('admin')->send();
        }
    }
    public function add_coupon(){
        $this->AuthLogin();
        return view('admin.add_coupon');
    }
    public function edit_coupon($coupon_id){
        $this->AuthLogin();
        $edit_coupon = DB::table('coupons')->where('id',$coupon_id)->get();
        $manager_coupon = view('admin.edit_coupon')->with('edit_coupon',$edit_coupon);
        return view('admin_layout')->with('admin.edit_coupon',$manager_coupon);
    }
    public function delete_coupon($coupon_id){
        $this->AuthLogin();
        DB::table('coupons')->where('id',$coupon_id)->delete($coupon_id);
        Session::put('message','Xóa nhà cung cấp thành công');
        return redirect('all-coupon');
    }
    public function all_coupon(){
        $this->AuthLogin();
        $itemPerPage = 5;
        $all_coupon = DB::table('coupons')->paginate($itemPerPage);
        $count_coupon = DB::table('coupons')->count();
        $manager_coupon = view('admin.all_coupon')
                        ->with('all_coupon',$all_coupon) 
                        ->with('count_coupon', $count_coupon)
                        ->with('itemPerPage', $itemPerPage);
        return view('admin_layout')->with('admin.all_coupon',$manager_coupon);
    }
    public function save_coupon(Request $req){
        $this->AuthLogin();
        $data = array();
        $data['code'] = $req->coupon_code;
        $data['type'] = $req->coupon_type;
        $data['value'] = $req->coupon_value;
        $data['percent_of'] = $req->coupon_percent_of;
        $data['apply_at'] = $req->apply_at;
        $data['end_at'] = $req->end_at;      
        DB::table('coupons')->insert($data);
        Session::put('message','Thêm khuyến mãi thành công');
        return redirect()->back();
    }
    public function update_coupon(Request $req, $coupon_id){
        $this->AuthLogin();
        $data = array();
        $data['code'] = $req->coupon_code;
        $data['type'] = $req->coupon_type;
        $data['value'] = $req->coupon_value;
        $data['percent_of'] = $req->coupon_percent_of;
        $data['apply_at'] = $req->apply_at;
        $data['end_at'] = $req->end_at;
        DB::table('coupons')->where('id',$coupon_id)->update($data);
        Session::put('message','Cập nhật khuyến mãi thành công');
        return redirect('all-coupon');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = Coupon::where('code',$request->coupon_code)->first();
        if(!$coupon){
            return redirect()->route('dathang')->withErrors('Invalid coupon code. Please try again.');
        }
        else if ($coupon) {
            $code = Coupon::where('code',$request->coupon_code)->get();
            return view('page.master', compact('code'));
        } else {
            return view('page.checkout');
        }
        /*
        session()->put('coupon',[
            'name' => $coupon->code,
            'discount' => discount(Cart::totalPrice()),
        ]);
        return redirect()->route('dathang')->withErrors('hihi');*/
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

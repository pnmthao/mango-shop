<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
Session_start();
class CustomerController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect('dashboard');
        }else{
            return Redirect('admin')->send();
        }
    }
    public function add_customer(){
        $this->AuthLogin();
        return view('admin.add_customer');
    }
    public function edit_customer($customer_id){
        $this->AuthLogin();
        $edit_customer = DB::table('customers')->where('id',$customer_id)->get();
        $manager_customer = view('admin.edit_customer')->with('edit_customer',$edit_customer);
        return view('admin_layout')->with('admin.edit_customer',$manager_customer);
    }
    public function delete_customer($customer_id){
        $this->AuthLogin();
        DB::table('customers')->where('id',$customer_id)->delete($customer_id);
        Session::put('message','Xóa khách hàng thành công');
        return redirect('all-customer');
    }
    public function all_customer(){
        $this->AuthLogin();
        $all_customer = DB::table('customers')->get();
        $manager_customer = view('admin.all_customer')->with('all_customer',$all_customer);
        return view('admin_layout')->with('admin.all_customer',$manager_customer);
    }
    public function save_customer(Request $req){
        $this->AuthLogin();
        $data = array();
        $data['name'] = $req->customer_name;
        $data['gender'] = $req->customer_gender;
        $data['email'] = $req->customer_email;
        $data['address'] = $req->customer_address;
        $data['phone'] = $req->customer_phone;
        $data['note'] = $req->customer_note;
        $data['created_at'] = $data['updated_at'] = date('Y-m-d H:i:s');
        $data['image'] = $req->customer_image;
        $data['image'] = '';
        $get_image = $req->file('customer_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/customer',$new_image);
            $data['image'] = $new_image;
        }        
        DB::table('customers')->insert($data);
        Session::put('message','Thêm khách hàng thành công');
        return redirect('all-customer');
    }
    public function update_customer(Request $req, $customer_id){
        $this->AuthLogin();
        $data = array();
        $data['name'] = $req->customer_name;
        $data['gender'] = $req->customer_gender;
        $data['email'] = $req->customer_email;
        $data['address'] = $req->customer_address;
        $data['phone'] = $req->customer_phone;
        $data['note'] = $req->customer_note;
        $data['created_at'] = $data['updated_at'] = date('Y-m-d H:i:s');
        $get_image = $req->file('customer_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/customer',$new_image);
            $data['image'] = $new_image;
            DB::table('customers')->where('id',$customer_id)->update($data);
            Session::put('message','Cập nhật khách hàng thành công');
            return redirect('all-customer');
        }     
        DB::table('customers')->where('id',$customer_id)->update($data);
        Session::put('message','Cập nhật khách hàng thành công');
        return redirect('all-customer');
    }
    public function unactive_customer($customer_id){
        $this->AuthLogin();
        DB::table('customers')->where('id',$customer_id)->update(['status'=>1]);
        Session::put('message','Không kích hoạt khách hàng');
        return redirect()->back();
    }
    public function active_customer($customer_id){
        $this->AuthLogin();
        DB::table('customers')->where('id',$customer_id)->update(['status'=>0]);
        Session::put('message','Kích hoạt khách hàng thành công');
        return redirect()->back();
    }
}

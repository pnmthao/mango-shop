<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class AdminController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect('dashboard');
        }else{
            return Redirect('admin_login')->send();
        }
    }
    public function index(){
        return view('admin_login');
    }
    public function show_dashboard(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function dashboard(Request $req){   
        $admin_email = $req->admin_email; 
        $admin_password = md5($req->admin_password);
        $result = DB::table('admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if ($result) {
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return view('admin.dashboard');
        }else{
            Session::put('message','Đăng nhập thất bại!');
            return view('admin_login');
        }
    }
    public function logout(){   
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return view('admin_login');
    }
    public function registration(){
        return view('admin_registration');
    }
    public function save_registration(Request $req){
        $data = array();
        $data['admin_name'] = $req->admin_name;
        $data['admin_image'] = $req->admin_image;
        $data['admin_email'] = $req->admin_email;
        $data['admin_phone'] = $req->admin_phone;
        $data['admin_password'] = md5($req->admin_password);
        $data['created_at'] = $data['updated_at'] = date('Y-m-d H:i:s');
        $data['admin_image'] = '';
        $get_image = $req->file('admin_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/profile',$new_image);
            $data['admin_image'] = $new_image;
        }        
        DB::table('admin')->insert($data);
        Session::put('message','Thêm tài khoản thành công');
        return view('admin_login');
    }
}

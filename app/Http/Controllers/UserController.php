<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
Session_start();
class UserController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect('dashboard');
        }else{
            return Redirect('admin')->send();
        }
    }
    public function edit_profile($profile_id){
        $this->AuthLogin();
        $edit_profile = DB::table('admin')->where('admin_id',$profile_id)->get();
        $manager_profile = view('admin.edit_profile')->with('edit_profile',$edit_profile);
        return view('admin_layout')->with('admin.edit_profile',$manager_profile);
    }
    public function update_profile(Request $req, $profile_id){
        $this->AuthLogin();
        $data = array();
        $data['admin_name'] = $req->profile_name;
        $data['admin_image'] = $req->profile_image;
        $data['admin_email'] = $req->profile_email;
        $data['admin_phone'] = $req->profile_phone;
        $data['admin_password'] = md5($req->profile_password);
        $data['created_at'] = $data['updated_at'] = date('Y-m-d H:i:s');
        $get_image = $req->file('profile_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/profile',$new_image);
            $data['admin_image'] = $new_image;
            DB::table('admin')->where('admin_id',$profile_id)->update($data);
            Session::put('message','Cập nhật hồ sơ cá nhân thành công');
            return redirect()->back();
        }     
        DB::table('admin')->where('admin_id',$profile_id)->update($data);
        Session::put('message','Cập nhật hồ sơ cá nhân thành công');
        return redirect()->back();
    }

}
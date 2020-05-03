<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Product;
use App\Customer;
use App\Bill;
use App\Comment;
use App\HelpersClass\Date;
class AdminController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) return Redirect('dashboard');
        return view('admin_login');
    }
    public function index()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) return Redirect('dashboard');
        return view('admin_login');
    }
    public function show_dashboard()
    {
        $product_count = Product::count();
        $customer_count = Customer::count();
        $bill_count = Bill::count();
        $comment_count = Comment::count();
        $list_day = Date::getListDayInMonth();
        $admin_id = Session::get('admin_id');
        $revenue_statistics_month = Bill::where('id_status',4)
            ->whereMonth('created_at',date("m"))
            ->select(\DB::raw('sum(total) as totalMoney'), \DB::raw('DATE(created_at) day'))
            ->groupBy('day')
            ->get()->toArray();
        $arrrevenue_statistics_month = [];
        foreach($list_day as $day){
            $total = 0;
            foreach($revenue_statistics_month as $key => $revenue){
                if ($revenue['day'] == $day){
                    $total = $revenue['totalMoney'];
                    break;
                }
            }
            $arrrevenue_statistics_month[] = $total;
        }
        //dd($revenue_statistics_month);
        //dd($list_day);
        if ($admin_id) return view('admin.dashboard', compact('list_day','arrrevenue_statistics_month','product_count', 'customer_count', 'bill_count', 'comment_count'));
        return view('admin_login');
    }
    public function dashboard(Request $req)
        {$this->validate(
            $req,
            [
                'admin_email' => 'required|email',
                'admin_password' => 'required|min:1|max:20' //validate password length 1-20
            ],
            [
                'admin_email.required' => 'Vui lòng nhập email',
                'admin_email.email' => 'Không đúng định dạng email',
                'admin_password.required' => 'Vui lòng nhập mật khẩu',
                'admin_password.min' => 'Mật khẩu ít nhất 6 ký tự',
                'admin_password.max' => 'Mật khẩu ít nhất 20 ký tự'
            ]
        );

    $admin_email = $req->admin_email;
    $admin_password = md5($req->admin_password);

    $result = DB::table('admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
    
    if ($result) {
        Session::put('admin_name', $result->admin_name);
        Session::put('admin_image', $result->admin_image);
        Session::put('admin_id', $result->admin_id);

        return Redirect('dashboard');
    } 
    else {
            Session::put('message', 'Đăng nhập thất bại!');
            return view('admin_login');
        }
    }

    public function logout()
    {
        $this->AuthLogin();
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return view('admin_login');
    }
    public function registration()
    {
        return view('admin_registration');
    }
    public function save_registration(Request $req)
    {
        $data = array();
        $data['admin_name'] = $req->admin_name;
        $data['admin_image'] = $req->admin_image;
        $data['admin_email'] = $req->admin_email;
        $data['admin_phone'] = $req->admin_phone;
        $data['admin_password'] = md5($req->admin_password);
        $data['created_at'] = $data['updated_at'] = date('Y-m-d H:i:s');
        $data['admin_image'] = '';
        $get_image = $req->file('admin_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/profile', $new_image);
            $data['admin_image'] = $new_image;
        }
        DB::table('admin')->insert($data);
        Session::put('message', 'Thêm tài khoản thành công');
        return view('admin_login');
    }
}

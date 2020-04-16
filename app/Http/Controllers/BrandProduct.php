<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;

Session_start();
class BrandProduct extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect('dashboard');
        } else {
            return Redirect('admin')->send();
        }
    }
    public function add_brand_product()
    {
        $this->AuthLogin();
        return view('admin.add_brand_product');
    }
    public function edit_brand_product($brand_product_id)
    {
        $this->AuthLogin();
        $edit_brand_product = DB::table('brand')->where('id', $brand_product_id)->get();
        $manager_brand_product = view('admin.edit_brand_product')->with('edit_brand_product', $edit_brand_product);
        return view('admin_layout')->with('admin.edit_brand_product', $manager_brand_product);
    }
    public function delete_brand_product($brand_product_id)
    {
        $this->AuthLogin();
        DB::table('brand')->where('id', $brand_product_id)->delete($brand_product_id);
        Session::put('message', 'Xóa nhà cung cấp thành công');
        return redirect('all-brand-product');
    }
    public function all_brand_product()
    {
        $this->AuthLogin();
        $all_brand_product = DB::table('brand')->get();
        $manager_brand_product = view('admin.all_brand_product')->with('all_brand_product', $all_brand_product);
        return view('admin_layout')->with('admin.all_brand_product', $manager_brand_product);
    }
    public function save_brand_product(Request $req)
    {
        $this->AuthLogin();
        $data = array();
        $data['name'] = $req->brand_product_name;
        $data['description'] = $req->brand_product_description;
        $data['name_en'] = $req->brand_product_name_en;
        $data['description_en'] = $req->brand_product_description_en;
        $data['status'] = $req->brand_product_status;
        $data['created_at'] = $data['updated_at'] = date('Y-m-d H:i:s');
        $data['image'] = $req->brand_product_image;
        $data['image'] = '';
        $get_image = $req->file('brand_product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/brand', $new_image);
            $data['image'] = $new_image;
        }
        DB::table('brand')->insert($data);
        Session::put('message', 'Thêm nhà cung cấp thành công');
        return redirect()->back();
    }
    public function update_brand_product(Request $req, $brand_product_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['name'] = $req->brand_product_name;
        $data['description'] = $req->brand_product_description;
        $data['name_en'] = $req->brand_product_name_en;
        $data['description_en'] = $req->brand_product_description_en;
        $data['created_at'] = $data['updated_at'] = date('Y-m-d H:i:s');
        $get_image = $req->file('brand_product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/brand', $new_image);
            $data['image'] = $new_image;
            DB::table('brand')->where('id', $brand_product_id)->update($data);
            Session::put('message', 'Cập nhật nhà cung cấp thành công');
            return redirect('all-brand-product');
        }
        DB::table('brand')->where('id', $brand_product_id)->update($data);
        Session::put('message', 'Cập nhật nhà cung cấp thành công');
        return redirect('all-brand-product');
    }
    public function unactive_brand_product($brand_product_id)
    {
        $this->AuthLogin();
        DB::table('brand')->where('id', $brand_product_id)->update(['status' => 1]);
        Session::put('message', 'Không kích hoạt nhà cung cấp');
        return redirect()->back();
    }
    public function active_brand_product($brand_product_id)
    {
        $this->AuthLogin();
        DB::table('brand')->where('id', $brand_product_id)->update(['status' => 0]);
        Session::put('message', 'Kích hoạt nhà cung cấp thành công');
        return redirect()->back();
    }
}

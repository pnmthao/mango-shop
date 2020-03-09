<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
Session_start();
class CategoryProduct extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect('dashboard');
        }else{
            return Redirect('admin')->send();
        }
    }
    public function add_category_product(){
        $this->AuthLogin();
        return view('admin.add_category_product');
    }
    public function edit_category_product($category_product_id){
        $this->AuthLogin();
        $edit_category_product = DB::table('type_products')->where('id',$category_product_id)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
        return view('admin_layout')->with('admin.edit_category_product',$manager_category_product);
    }
    public function delete_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('type_products')->where('id',$category_product_id)->delete($category_product_id);
        Session::put('message','Xóa danh mục sản phẩm thành công');
        return redirect('all-category-product');
    }
    public function all_category_product(){
        $this->AuthLogin();
        $all_category_product = DB::table('type_products')->get();
        $manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
        return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
    }
    public function save_category_product(Request $req){
        $this->AuthLogin();
        $data = array();
        $data['name'] = $req->category_product_name;
        $data['description'] = $req->category_product_description;
        $data['status'] = $req->category_product_status;
        $data['created_at'] = $data['updated_at'] = date('Y-m-d H:i:s');
        $data['image'] = $req->category_product_image;
        $data['image'] = '';
        $get_image = $req->file('category_product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/category_product',$new_image);
            $data['image'] = $new_image;
        }        
        DB::table('type_products')->insert($data);
        Session::put('message','Thêm danh mục sản phẩm thành công');
        return redirect('all-category-product');
    }
    public function update_category_product(Request $req, $category_product_id){
        $this->AuthLogin();
        $data = array();
        $data['name'] = $req->category_product_name;
        $data['description'] = $req->category_product_description;
        $data['image'] = $req->category_product_image;
        $data['created_at'] = $data['updated_at'] = date('Y-m-d H:i:s');
        $get_image = $req->file('category_product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/category_product',$new_image);
            $data['image'] = $new_image;
            DB::table('type_products')->where('id',$category_product_id)->update($data);
            Session::put('message','Cập nhật danh mục sản phẩm thành công');
            return redirect('all-category-product');
        }     
        DB::table('type_products')->where('id',$category_product_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return redirect('all-category-product');
    }
    public function unactive_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('type_products')->where('id',$category_product_id)->update(['status'=>1]);
        Session::put('message','Không kích hoạt danh mục sản phẩm');
        return redirect()->back();
    }
    public function active_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('type_products')->where('id',$category_product_id)->update(['status'=>0]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return redirect()->back();
    }
}

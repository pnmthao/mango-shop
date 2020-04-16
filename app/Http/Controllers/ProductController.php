<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
use File;

Session_start();
class ProductController extends Controller
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
    public function add_product()
    {
        $this->AuthLogin();
        $cate_product = DB::table('type_products')->orderby('id', 'desc')->get();
        $brand_product = DB::table('brand')->orderby('id', 'desc')->get();
        $unit_product = DB::table('unit')->orderby('unit_id', 'desc')->get();
        return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product', $brand_product)->with('unit_product', $unit_product);
    }
    public function edit_product($product_id)
    {
        $this->AuthLogin();
        $edit_product = DB::table('products')->where('id', $product_id)->get();
        $cate_product = DB::table('type_products')->orderby('id', 'desc')->get();
        $brand_product = DB::table('brand')->orderby('id', 'desc')->get();
        $unit_product = DB::table('unit')->orderby('unit_id', 'desc')->get();
        $manager_product = view('admin.edit_product')->with('edit_product', $edit_product)->with('cate_product', $cate_product)->with('brand_product', $brand_product)->with('unit_product', $unit_product);
        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }
    public function delete_product($product_id)
    {
        $this->AuthLogin();
        DB::table('products')->where('id', $product_id)->delete($product_id);
        Session::put('message', 'Xóa sản phẩm thành công');
        return redirect('all-product');
    }
    public function all_product()
    {
        $this->AuthLogin();
        $all_product = DB::table('products')
            ->join('type_products', 'type_products.id', '=', 'products.id_type')
            ->join('brand', 'brand.id', '=', 'products.id_brand')
            ->join('unit', 'unit.unit_id', '=', 'products.id_unit')
            ->select('products.*', 'products.description as description_product', 'type_products.name as name_type', 'brand.name as name_brand', 'unit.unit_name as unit_name')
            ->orderby('products.id', 'desc')->get();
        $manager_product = view('admin.all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('admin.all_product', $manager_product);
    }
    public function save_product(Request $req)
    {
        $this->AuthLogin();
        $data = array();
        $data['name'] = $req->product_name;
        $data['name_en'] = $req->product_name_en;
        $data['id_type'] = $req->product_cate; //Products table
        $data['id_brand'] = $req->product_brand; //Products table
        $data['id_unit'] = $req->product_unit;
        $data['description'] = $req->product_description;
        $data['description_en'] = $req->product_description_en;
        $data['quantity'] = $req->product_quantity;
        $data['promotion_price'] = $req->product_promotion_price;
        $data['unit_price'] = $req->product_unit_price;
        $data['status'] = $req->product_status;
        $data['new'] = $req->product_new;
        $data['created_at'] = $data['updated_at'] = date('Y-m-d H:i:s');
        $data['image'] = $req->product_image;
        $get_image = $req->file('product_image');
        $data['image'] = '';
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/product', $new_image);
            $data['image'] = $new_image;
        }
        DB::table('products')->insert($data);
        Session::put('message', 'Thêm sản phẩm thành công');
        return redirect('all-product');
        //print_r($data);
        // if($get_image){
        //         $get_name_image = $get_image->getClientOriginalName();
        //         $name_image = current(explode('.',$get_name_image));
        //         $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        //         $get_image->move('uploads/product',$new_image);
        //         $data['image'] = $new_image;
        //         DB::table('products')->insert($data);
        //         Session::put('message','Thêm sản phẩm thành công');
        //         return redirect('add-product');
        //     }     
        // $data['image'] = '';
        // DB::table('products')->insert($data);
        // Session::put('message','Thêm sản phẩm thành công');
        // return redirect('add-product');
    }
    public function update_product(Request $req, $product_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['name'] = $req->product_name;
        $data['name_en'] = $req->product_name_en;
        $data['id_type'] = $req->product_cate; //Products table
        $data['id_brand'] = $req->product_brand; //Products table
        $data['id_unit'] = $req->product_unit;
        $data['description'] = $req->product_description;
        $data['description_en'] = $req->product_description_en;
        $data['quantity'] = $req->product_quantity;
        $data['promotion_price'] = $req->product_promotion_price;
        $data['unit_price'] = $req->product_unit_price;
        $data['status'] = $req->product_status;
        $data['new'] = $req->product_new;
        $data['created_at'] = $data['updated_at'] = date('Y-m-d H:i:s');
        $get_image = $req->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/product', $new_image);
            $data['image'] = $new_image;
            DB::table('products')->where('id', $product_id)->update($data);
            Session::put('message', 'Cập nhật sản phẩm thành công');
            return redirect('all-product');
        }
        DB::table('products')->where('id', $product_id)->update($data);
        Session::put('message', 'Cập nhật sản phẩm thành công');
        return redirect('all-product');
    }
    public function unactive_product($product_id)
    {
        $this->AuthLogin();
        DB::table('products')->where('id', $product_id)->update(['status' => 1]);
        Session::put('message', 'Không kích hoạt sản phẩm');
        return redirect()->back();
    }
    public function active_product($product_id)
    {
        $this->AuthLogin();
        DB::table('products')->where('id', $product_id)->update(['status' => 0]);
        Session::put('message', 'Kích hoạt sản phẩm thành công');
        return redirect()->back();
    }
}

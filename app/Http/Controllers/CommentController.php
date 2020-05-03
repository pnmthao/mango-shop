<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
Session_start();
use App\Product;
use App\Comment;
use App\Customer;
use Session;
class CommentController extends Controller
{
    public function AuthLogin()
    {
        $customer_id = Session::get('customer_id');
        if ($customer_id) {
            return Redirect('index');
        } else {
            return Redirect('dang-nhap')->send();
        }
    }
    public function postComment($id,Request $request)
    {   
        $this->AuthLogin();
        $id_product = $id;
        $comment = new Comment;
        $comment->id_product = $id_product;
        $comment->id_customer = Session::get('customer_id');
        $comment->comment = $request->NoiDung;
        $comment->status = "1";
        $comment->save();
        return redirect()->back();
    }
    public function all_comment(){
        $itemPerPage = 5;
        $all_comment = DB::table('comments')
                    ->join('products','products.id','=','comments.id_product')
                    ->join('customers','customers.id','=','comments.id_customer')
                    ->select('comments.*', 'products.name as name_product', 'customers.name as name_customer')
                    ->orderby('comments.id','desc')->paginate($itemPerPage);
        $count_comment = DB::table('comments')->count();
        $manager_product = view('admin.all_comment')
                        ->with('all_comment',$all_comment)
                        ->with('count_comment', $count_comment)
                        ->with('itemPerPage', $itemPerPage);
        return view('admin_layout')->with('admin.all_comment',$manager_product);
    }
    public function unactive_comment($comment_id){
        DB::table('comments')->where('id',$comment_id)->update(['status'=>1]);
        Session::put('message','Hiển thị đánh giá thành công');
        return redirect()->back();
    }
    public function active_comment($comment_id){
        DB::table('comments')->where('id',$comment_id)->update(['status'=>0]);
        Session::put('message','Ẩn đánh giá thành công');
        return redirect()->back();
    }
}

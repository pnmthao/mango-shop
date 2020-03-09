<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use App\Brand;
use Session;
use Hash;
use Auth;


class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
        $new_product = Product::where('new',1)->paginate(4);
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(8);
        //return view('page.trangchu',['slide'=>$slide]);
        $sp_traicay = Product::where('id_type','=','4')->get();
        $sp_thit = Product::where('id_type','=','20')->get();
        return view('page.trangchu',compact('slide','new_product','sanpham_khuyenmai','sp_traicay','sp_thit'));
    }
    public function getLoaiSp($type){
        $sp_theoloai = Product::where('id_type',$type)->get();
        $sp_khac = Product::where('id_type','<>',$type)->paginate(3);
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id',$type)->first();
        return view('page.loai_sanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }
    public function getNhaCungCapSp($type){
        $sp_theonhacungcap = Product::where('id_brand',$type)->get();
        $sp_khac = Product::where('id_brand','<>',$type)->paginate(3);
        $nha_cung_cap = Brand::all();
        $nha_cung_cap_sp = Brand::where('id',$type)->first();
        return view('page.nhacungcap_sanpham',compact('sp_theonhacungcap','sp_khac','nha_cung_cap','nha_cung_cap_sp'));
    }
    public function getChitiet(Request $req){
        $sanpham = Product::where('id',$req->id)->first();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->whereNotIn('id',array($req->id))->paginate(3);
        return view('page.chitiet_sanpham',compact('sanpham','sp_tuongtu'));
    }
    public function getLienHe(){
        return view('page.lienhe');
    }
    public function getGioiThieu(){
        return view('page.gioithieu');
    }
    public function getFaqs(){
        return view('page.faqs');
    }
    public function getTerms(){
        return view('page.terms');
    }
    public function getPrivacy(){
        return view('page.privacy');
    }
    public function getAddtoCart(Request $req, $id){
        $qty = $req->qty;
        $product = Product::Find($id);
        $oldCart= Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id, $qty);
        $req->Session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getDelItemCart($id){
        $oldCart= Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0)
            Session::put('cart',$cart);
        else
            Session::forget('cart');
        return redirect()->back();
    }
    public function getCheckout(){
        if(Session('cart')){
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            //dd($cart);
            return view('page.dat_hang',['product_cart'=>$cart->items, 'totalPrice'=>$cart->totalPrice, 'totalQty'=>$cart->totalQty]);
        }
        else{
            return view('page.dat_hang');
        }
    }
    public function postCheckout(Request $req){
        $cart = Session::get('cart');
        $customer = new Customer;
        $customer->name = $req->full_name; 
        $customer->gender = $req->gender; 
        $customer->email = $req->email; 
        $customer->address = $req->address;
        $customer->phone = $req->phone;  
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach($cart->items as $key=>$value){
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['price']/$value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');
    }
    public function getLogin(){
        return view('page.dangnhap');
    }
    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 ký tự',
                'password.max'=>'Mật khẩu ít nhất 20 ký tự'
            ]);
       
        $credentials = array('email'=>$req->email,'password'=>$req->password);

        if(Auth::attempt($credentials)){
            return redirect()->back()->with(['flag'=>'success','message'=>'Bạn đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with(['flag'=>'fail','message'=>'Bạn đăng nhập không thành công']);
        }    
    }
    public function getSignup(){
        return view('page.dangky');
    }
    public function postSignup(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:customers,email',
                'password'=>'required|min:6|max:20',
                'name'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã tồn tại',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 ký tự',
                'password.max'=>'Mật khẩu ít nhất 20 ký tự'
            ]);
        $user = new Customer;
       // $user = User::find(Auth::user()->id);
        $user->name = $req->name;  
        $user->email = $req->email; 
        $user->password=Hash::make($req->password);
        $user->address = $req->address;
        $user->phone = $req->phone;  
        $user->save();
        return redirect()->back()->with('thongbao','Bạn đã tạo tài khoản thành công');
    }
    public function getLogout(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }
    public function getSearch(Request $req){
        $product = Product::where('name','like','%'.$req->key.'%')
                            ->orWhere('unit_price',$req->key)
                            ->get();
        $new_product = Product::where('new',1)->paginate(4);
        return view('page.search',compact('product','new_product'));
    }
}

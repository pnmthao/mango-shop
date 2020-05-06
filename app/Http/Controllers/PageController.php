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
use App\Coupon;

use DB;
use Session;
use Hash;
// use Auth;


class PageController extends Controller
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
    public function getIndex()
    {
        $new_product = Product::where([['new', 1],['status', '=', 1],])->paginate(4);
        $sanpham_khuyenmai = Product::where([['promotion_price', '<>', 0],['status', '=', 1],])->paginate(9);
        $sp_traicay = Product::where([['id_type', '=', '4'],['status', '=', 1],])->paginate(6);
        $sp_thit = Product::where([['id_type', '=', '20'],['status', '=', 1],])->paginate(6);
        return view('page.home', compact('new_product', 'sanpham_khuyenmai', 'sp_traicay', 'sp_thit'));
    }
    public function getLoaiSp($type)
    {
        $sp_theoloai = Product::where([['id_type', $type],['status', '=', 1],])->get();
        $sp_khac = Product::where([['id_type', '<>', $type],['status', '=', 1],])->get();
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id', $type)->first();
        return view('page.products_by_category', compact('sp_theoloai', 'sp_khac', 'loai', 'loai_sp'));
    }
    public function getNhaCungCapSp($type)
    {
        $sp_theonhacungcap = Product::where([['id_brand', $type],['status', '=', 1],])->get();
        $sp_khac = Product::where([['id_brand', '<>', $type],['status', '=', 1],])->paginate(3);
        $nha_cung_cap = Brand::all();
        $nha_cung_cap_sp = Brand::where('id', $type)->first();
        return view('page.products_by_supplier', compact('sp_theonhacungcap', 'sp_khac', 'nha_cung_cap', 'nha_cung_cap_sp'));
    }
    public function getChitiet(Request $req)
    {
        $sanpham = Product::where('id', $req->id)->first();
        $sp_tuongtu = Product::where('id_type', $sanpham->id_type)->whereNotIn('id', array($req->id))->paginate(3);
        $comment = DB::table('comments')
                    ->join('customers','customers.id','=','comments.id_customer')
                    ->select('comments.*', 'customers.name as name_customer')
                    ->where([['id_product',$sanpham->id],['status', '=', 1],])
                    ->orderby('comments.id','desc')->get();
        return view('page.product_details', compact('sanpham', 'sp_tuongtu','comment'));
    }
    public function getLienHe()
    {
        return view('page.contact');
    }
    public function getGioiThieu()
    {
        return view('page.about_us');
    }
    public function getFaqs()
    {
        return view('page.faqs');
    }
    public function getTerms()
    {
        return view('page.terms');
    }
    public function getPrivacy()
    {
        return view('page.privacy');
    }
    public function getAddtoCart(Request $req, $id)
    {
        $qty = $req->qty;
        $product = Product::Find($id);
        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id, $qty);
        $req->Session()->put('cart', $cart);
        return redirect()->back();
    }
    public function getDelItemCart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0)
            Session::put('cart', $cart);
        else
            Session::forget('cart');
        return redirect()->back();
    }
    public function getPayment()
    {
        return view('page.payment');
    }
    public function getCheckout()
    {
        $this->AuthLogin();
        if (Session('cart')) {
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            //dd($cart);
            return view('page.checkout', ['product_cart' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' => $cart->totalQty]);
        } else {
            $coupons = Coupon::All();
            return view('page.checkout')->with('coupons', $coupons);;
        }
    }
    public function postCheckout(Request $req)
    {
        $bill = new Bill;
        $bill->id_customer = Session::get('customer_id');
        $bill->date_order = date('Y-m-d');
        $bill->total = $req->total;
        // $bill->payment = $req->payment_method;
        // $bill->note = $req->notes;
        $bill->save();

        $items = json_decode($req->items, true);
        foreach ($items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_unit = $value['item_unit'];
            $bill_detail->id_product = $value['item_id'];
            $bill_detail->quantity = $value['quantity'];
            $bill_detail->unit_price = $value['unit_price'];
            $bill_detail->save();
        }
        return redirect()->back()->with('thongbao', 'Đặt hàng thành công');
    }
    public function getLogin()
    {
        $customer_id = Session::get('customer_id');
        if ($customer_id) {
            return Redirect('index');
        }
        return view('page.signin');
    }
    public function postLogin(Request $req)
    {
        $this->validate(
            $req,
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:20'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Mật khẩu ít nhất 6 ký tự',
                'password.max' => 'Mật khẩu ít nhất 20 ký tự'
            ]
        );
        $customer_email = $req->email;
        $customer_password = md5($req->password);
        $result = DB::table('customers')->where('email', $customer_email)->where('password', $customer_password)->first();

        if ($result) {
            Session::put('customer_name', $result->name);
            Session::put('customer_id', $result->id);
            Session::put('customer_email', $result->email);
            Session::put('customer_address', $result->address);
            Session::put('customer_phone', $result->phone);
            return Redirect('index');
        }
        return redirect()->back()->with(['flag' => 'fail', 'message' => 'Bạn đăng nhập thất bại']);
    }
    public function getSignup()
    {
        return view('page.register');
    }
    public function postSignup(Request $req)
    {
        $this->validate(
            $req,
            [
                'email' => 'required|email|unique:customers,email',
                'password' => 'required|min:6|max:20',
                'name' => 'required',
                're_password' => 'required|same:password'
            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng email',
                'email.unique' => 'Email đã tồn tại',
                'password.required' => 'Vui lòng nhập mật khẩu',
                're_password.required' => 'Vui lòng nhập mật khẩu',
                're_password.same' => 'Mật khẩu không giống nhau',
                'password.min' => 'Mật khẩu ít nhất 6 ký tự',
                'password.max' => 'Mật khẩu ít nhất 20 ký tự'
            ]
        );
        $user = new Customer;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = md5($req->password);
        $user->address = $req->address;
        $user->phone = $req->phone;
        $user->save();
        return redirect()->back()->with('thongbao', 'Bạn đã tạo tài khoản thành công');
    }
    public function getLogout()
    {
        $this->AuthLogin();
        Session::flush();
        return redirect()->route('trang-chu');
    }
    public function getSearch(Request $req)
    {
        $product = Product::where([['name', 'like', '%' . $req->key . '%'],['status', '=', 1],])
            ->orWhere([['name_en', 'like', '%' . $req->key . '%'],['status', '=', 1],])
            ->orWhere('unit_price', $req->key)
            ->get();
        $new_product = Product::where([['new', 1],['status', '=', 1],])->paginate(4);
        return view('page.search', compact('product', 'new_product'));
    }
}

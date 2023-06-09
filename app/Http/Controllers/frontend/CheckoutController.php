<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Orderdetail;
use App\Cart;
use Carbon\Carbon;
use Session;
use Mail;

class CheckoutController extends Controller
{
  
  
   //thanh toan
   public function checkout ()
   {
      if(Auth::guard('customer')->check()){
         return view ('frontend.giohang.checkout');
      }
      else
      {
         return redirect()->route('login.dangnhap');
      }
   }

//Dat hang thanh cong
   public function dathangthanhcong(Request $req){
      $cus_id = Auth::guard('customer')->user()->id;
      $auth = Auth::guard('customer')->user();
      $order = new Order;
      $order->cus_id = $cus_id;
      $order->fullname = Auth::guard('customer')->user()->fullname;
      $order->email = Auth::guard('customer')->user()->email;
      $order->phone = Auth::guard('customer')->user()->phone;
      $order->district = Auth::guard('customer')->user()->address;
     // $order->note = $req->note;
       $order->created_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
       $order->status = 1;
      if($order->save()){
         if (Session::has("Cart")!= null){
            foreach (Session::get("Cart")->products as $item)
            {
               $order_detail = new Orderdetail;
               $order_detail->order_id = $order->id;
               $order_detail->product_id = $item['productinfo']->id;
               $order_detail->number = $item['soluong'];
               $order_detail->price = $item['productinfo']->price_buy;
               $order_detail->amount = (int)$item['productinfo']->price_buy*(int)$item['soluong'];
               $order_detail->created_by = 1;
               $order_detail->status = 1;
               $order_detail->created_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
              //dd($order_detail);
              $order_detail->save();
            }
               //Giui mail xac nhan
               Mail::send('emails.check_order', compact('order','auth'), function ($email) use($auth) {
                   $email->subject('Shopdientu-Xác nhận đơn hàng');
                   $email->to($auth->email, $auth->fullname);
               });
               // Huy gio hang
                $req->session()->forget('Cart');
                return view ('frontend.giohang.dathangthanhcong',compact('order'));
         }
         else
         {
            return view ('frontend.giohang.index')->with('message', ['type' => 'danger', 'msg' => 'Không tồn tại sản phẩm trong giỏ hàng của bạn!']);
         }
         
         
      }
      
    
   }

         public function theodoidonhang (){
            return view ('frontend.giohang.status');
         }

    
}
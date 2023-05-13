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
      //$order->address = Auth::guard('customer')->user()->address;
     // $order->note = $req->note;
       $order->created_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
      $order->status = 1;
      $order->save();
      //dd($order);
     //return view ('frontend.giohang.dathangthanhcong');
   }

    
}
<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Orderdetail;
use App\Cart;
use Session;

class CheckoutController extends Controller
{

    public function __construct(){
        $this->middleware('Cus');
    }

     //thanh toan
     public function checkout (){
        return view ('frontend.giohang.checkout');
    }

//Dat hang thanh cong
   public function dathangthanhcong(Request $req){
       
        
        


     //return view ('frontend.giohang.dathangthanhcong');
   }

    
}
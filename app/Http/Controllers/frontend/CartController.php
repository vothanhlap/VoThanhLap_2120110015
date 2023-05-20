<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\ProductImage;
use App\Models\ProductStore;
use App\Cart;
use Session;

class CartController extends Controller
{
    //tat ca gio hang
    public function index(){
      
       return view ('frontend.giohang.index');
    }
    // them
    public function Addcart(Request $req, $id)
    {     
           $product = Product::where('id',$id)->first();
           if($product != null){
            $oldcart = Session('Cart') ? Session('Cart') :null;
            $newCart = new Cart( $oldcart);
            $newCart->Addcart($product,$id);    
            $req->session()->put('Cart',$newCart);
            return view ('frontend.giohang.cart-item');
        }
    }
    //xoa 
    public function deleteCart(Request $req, $id){     
       
            $oldcart = Session('Cart') ? Session('Cart') :null;
            $newCart = new Cart( $oldcart);
            $newCart->deleteCart($id);
            if(Count($newCart->products)>0){

                $req->session()->put('Cart',$newCart);
            }else{
                $req->session()->forget('Cart');
            }
            
            return view ('frontend.giohang.cart-item');
    }
    //Xoa list cart
      //xoa 
      public function deletelistCart(Request $req, $id)
      {     
        $oldcart = Session('Cart') ? Session('Cart') :null;
        $newCart = new Cart( $oldcart);
        $newCart->deleteCart($id);
        if(Count($newCart->products)>0){
            $req->session()->put('Cart',$newCart);
        }else{
            $req->session()->forget('Cart');
        }   
        return view ('frontend.giohang.list-cart');
}   

    public function savelistCart (Request $req, $id, $quanty){
        $oldcart = Session('Cart') ? Session('Cart') :null;
        $newCart = new Cart( $oldcart);
        $newCart->updateCart($id, $quanty);
        $req->session()->put('Cart',$newCart);
        return view ('frontend.giohang.list-cart');


    }

}
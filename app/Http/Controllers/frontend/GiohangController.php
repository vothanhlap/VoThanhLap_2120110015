<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\ProductImage;
use App\Models\ProductStore;

class GiohangController extends Controller
{
    //tat ca gio hang
    public function index(){
       $products = Product::all();
       return view ('frontend.giohang.index',compact('products'));
    }
    // them
    public function addcart(string $id){   
          
    //     $product = Product::findOrFail($id);
    //    $cart = session()->get('cart',[]);
    //    if(isset($cart[$id])){
    //     $cart[$id]['soluong']++;
    //    }else
    //    {
    //     $cart[$id]=[
    //         "product_id"=>$product->product_id,
    //         "name"=>$product->name,
    //         "price"=>$product->price_buy,
    //         "soluong"=>1 
    //     ];
    //    }
    //    session()->put('cart',$cart);
    //    return redirect()->back()->with('message', ['type' => 'success', 'msg' => 'Them vao gio hang thanh cong !']);
    }
     //cap nhat
    public function updatecart(string $id){     
       
    }
    //xoa 
    public function deletecart(string $id){     
       
    }

    
}
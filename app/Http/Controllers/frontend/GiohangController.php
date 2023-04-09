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
       return view ('frontend.giohang.index');
    }
    // them
    public function addcart(string $id){     
        $product = Product::find($id);
        print_r( $product);
    }
     //cap nhat
    public function updatecart(string $id){     
       
    }
    //xoa 
    public function deletecart(string $id){     
       
    }

    
}
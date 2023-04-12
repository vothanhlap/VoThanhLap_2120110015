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


class CartController extends Controller
{
    //tat ca gio hang
    public function index(){
      
       return view ('frontend.giohang.index');
    }
    // them
    public function addcart(Request $req, $id)
    {   
       
    }
     //cap nhat
    public function updatecart(string $id){     
       
    }
    //xoa 
    public function deletecart(string $id){     
       
    }

    
}
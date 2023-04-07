<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class GiohangController extends Controller
{
    public function addcart(string $id){     
        $product = Product::find($id);
        print_r( $product);

       // return view ('frontend.giohang.index');
    }

    
}
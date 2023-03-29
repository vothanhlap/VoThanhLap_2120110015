<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Orderdetail;
use App\Models\User;

class DashboardController extends Controller
{
    function index()
    {
        $user_name = Auth::user()->name;
        $product_count=Product::count();
        return view('backend.dashboard.index',compact('product_count','user_name'));
    }
}

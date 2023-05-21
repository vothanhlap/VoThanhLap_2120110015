<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ProductStore;
use App\Models\Post;
use App\Models\Customer;
use App\Models\Orderdetail;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
   public function index()
    {
        $user_name = Auth::user()->name;
        $product_count=ProductStore::sum('qty');
        $post_count=Post::count();
        $custumer_count=User::count();
        $order_count=Orderdetail::sum('amount');
        $list_order = Order::
        where('status','=',1)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('backend.dashboard.index',compact('list_order','order_count','custumer_count','post_count','product_count','user_name'));
    }

        public function show(string $id){
            $user_name = Auth::user()->name;
            $user = User::find($id);
            return view ('backend.dashboard.infouser',compact('user'));
        }


}

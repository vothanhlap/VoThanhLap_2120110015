<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Link;
use Illuminate\Support\Str;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Requests\OrderUpdateRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class OrderdetailController extends Controller
{
    #GET: admin/order , admin/order/index
    public function index()
    {
        $user_name = Auth::user()->name;
        $list_order  = Order::where('status', '!=', 0);
        $list_orderdetail  = Orderdetail::where('status', '!=', 0)
       ->orderBy('created_at', 'desc')
       ->get();
        return view('backend.orderdetail.index', compact('list_orderdetail','list_order','user_name'));
    }
}

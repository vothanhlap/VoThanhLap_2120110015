<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Link;
use Illuminate\Support\Str;
use App\Http\Requests\orderStoreRequest;
use App\Http\Requests\orderUpdateRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    #GET: admin/order , admin/order/index
    public function index()
    {
        $user_name = Auth::user()->name;
        $list_order  = Order::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.order.index', compact('list_order','user_name'));
    }
      // #GET:admin/order/trash
    public function trash()
    {
        $user_name = Auth::user()->name;
        $list_order  = Order::where('status', '=', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.order.trash', compact('user_name','list_order'));
    }
    // #GET: admin/order/destroy/
    // // Xóa hẳn
    public function destroy(string $id)
    {
        $user_name = Auth::user()->name;
        $order = Order::find($id);
        //thong tin hinh xoa
        $path_dir = "images/order/";
        $path_image_delete = $path_dir . $order->image;
        if ($order == null) {
            return redirect()->route('order.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại!']);
        }
        if ($order->delete()) {
            //xoa hinh
            if (File::exists($path_image_delete)) {
                File::delete($path_image_delete);
            }
        }
        $link = Link::where([['type', '=', 'order'], ['table_id', '=', $id]])->first();
        $link->delete();
        return redirect()->route('order.index')->with('message', ['type' => 'success', 'msg' => 'Xóa mẫu tin thành công !']);
    }
    // #GET: admin/order/status/
    public function status($id)
    {
        $user_name = Auth::user()->name;
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('order.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        }
        $order->status = ($order->status == 1) ? 2 : 1;
        $order->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $order->updated_by = $user_name;
        $order->save();
        return redirect()->route('order.index')->with('message', ['type' => 'success', 'msg' => 'Thay đổi trạng thái thành công !']);
    }


    //chi tiet don hang
    public function show(string $id )
    {
        $dk= [
            ['status', '!=', 0],
            ['id','=','order_id']
        ];
        $user_name = Auth::user()->name;
        $orderdetail  =Orderdetail::find($id);
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('order.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        } else {
            return view('backend.order.show', compact('orderdetail','order','user_name'));
        }
    }

    // #GET: admin/order/delete/
    // // xóa vào thùng rác
    public function delete($id)
    {
        $user_name = Auth::user()->name;
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('order.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        } else {
            $order->status = 0;
            $order->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
            $order->updated_by = $user_name;
            $order->save();
            return redirect()->route('order.index')->with('message', ['type' => 'success', 'msg' => 'Xóa vào thùng rác thành công !']);
        }
    }
       // #GET: admin/order/restore/
    // // Khôi phục
    public function restore($id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('order.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        } else {
            $order->status = 2;
            $order->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
            $order->updated_by = 1;
            $order->save();
            return redirect()->route('order.trash')->with('message', ['type' => 'success', 'msg' => 'Khôi phục thành công !']);
        }
    }

    public function Huy($id)
    {
        
    }

    public function Xacminh($id)
    {
        
        
    }

    public function Vanchuyen($id)
    {
       echo 'Đơn hang đươc vân chuyển';
    }

    public function Thanhcong($id)
    {
       echo 'Đơn hang đươc giao đến khách hàng thành công';
    }

    public function Xuathoadon($id)
    {
        echo 'Đơn hang đã được xuất file';
    }

}

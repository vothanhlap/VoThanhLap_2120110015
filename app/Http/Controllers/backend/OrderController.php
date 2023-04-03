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
        $list_order  = Order:: join('vtl_user','vtl_user.id','=','vtl_order.user_id')
        ->join('vtl_product','vtl_product.id','=','vtl_order.product_id')
       ->where('vtl_order.status', '!=', 0)
       ->orderBy('vtl_order.created_at', 'desc')
       ->select('vtl_order.*','vtl_user.name as uname','vtl_product.name as prname')
       ->get();
        return view('backend.order.index', compact('list_order','user_name'));
    }
      // #GET:admin/order/trash
    public function trash()
    {
        $user_name = Auth::user()->name;
        $list_order  = Order:: join('vtl_user','vtl_user.id','=','vtl_order.user_id')
        ->join('vtl_product','vtl_product.id','=','vtl_order.product_id')
       ->where('vtl_order.status', '=', 0)
       ->orderBy('vtl_order.created_at', 'desc')
       ->select('vtl_order.*','vtl_user.name as uname','vtl_product.name as prname')
       ->get();
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
    public function show(string $id)
    {
        $user_name = Auth::user()->name;
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('order.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        } else {
            return view('backend.order.show', compact('order','user_name'));
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

    // #GET: admin/order/create , admin/order/index
    // public function create()
    // {
    //     $user_name = Auth::user()->name;
    //     $list_order  = Order::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
    //     $html_parent_id = '';
    //     $html_sort_order = '';
    //     foreach ($list_order as $item) {
    //         $html_parent_id .= '<option value="' . $item->id . '">' . $item->title . '</option>';
    //         $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->title . '</option>';
    //     }
    //     return view('backend.order.create', compact('user_name','html_parent_id', 'html_sort_order'));
    // }

    // // thêm
    // public function store(orderStoreRequest $request)
    // {
    //     $user_name = Auth::user()->name;
    //     $order = new order();
    //     $order->title = $request->title;
    //     $order->slug = Str::slug($order->title = $request->title, '-');
    //     $order->metakey = $request->metakey;
    //     $order->metadesc = $request->metadesc;
    //     $order->detail = $request->detail;
    //     $order->parent_id = $request->parent_id;
    //     $order->sort_order = $request->sort_order;
    //     $order->status = $request->status;
    //     $order->created_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
    //     $order->created_by = $user_name;
    //     //Upload file
    //     if ($request->has('image')) {
    //         $path_dir = "images/order"; // nơi lưu trữ
    //         $file = $request->file('image');
    //         $extension = $file->getClientOriginalExtension(); // lấy phần mở rộng của tập tin 
    //         $filename = $order->slug . '.' . $extension; // lấy tên slug  + phần mở rộng 
    //         $file->move($path_dir, $filename);

    //         $order->image = $filename;
    //     }
    //     // End upload
    //     if ($order->save()) {
    //         $link = new Link();
    //         $link->slug = $order->slug;
    //         $link->table_id = $order->id;
    //         $link->type = 'order';
    //         $link->save();
    //         return redirect()->route('order.index')->with('message', ['type' => 'success', 'msg' => 'Thêm mẫu tin thành công !']);
    //     } else
    //         return redirect()->route('order.index')->with('message', ['type' => 'danger', 'msg' => 'Thêm mẫu tin không thành công !']);
    // }

    

    // public function edit(string $id)
    // {

    //     $user_name = Auth::user()->name;
    //     $order = Order::find($id);
    //     $list_order  = Order::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
    //     $html_parent_id = '';
    //     $html_sort_order = '';
    //     foreach ($list_order as $item) {
    //         $html_parent_id .= '<option value="' . $item->id . '">' . $item->title . '</option>';
    //         $html_sort_order .= '<option value="' . $item->sort_order . '">Sau: ' . $item->title . '</option>';
    //     }
    //     return view('backend.order.edit', compact('user_name','order', 'html_parent_id', 'html_sort_order'));
    // }

    // public function update(orderUpdateRequest $request, $id)
    // {
    //     $user_name = Auth::user()->name;
    //     $order = Order::find($id);
    //     $order->title = $request->title;
    //     $order->slug = Str::slug($order->title = $request->title, '-');
    //     $order->metakey = $request->metakey;
    //     $order->metadesc = $request->metadesc;
    //     $order->detail = $request->detail;
    //     $order->parent_id = $request->parent_id;
    //     $order->sort_order = $request->sort_order;
    //     $order->status = $request->status;
    //     $order->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
    //     $order->updated_by = $user_name;
    //     // Upload file
    //     if ($request->has('image')) {
    //         $path_dir = "images/order/";
    //         if (File::exists(($path_dir . $order->image))) {
    //             File::delete(($path_dir . $order->image));
    //         }

    //         $file = $request->file('image');
    //         $extension = $file->getClientOriginalExtension(); // lấy phần mở rộng của tập tin
    //         $filename = $order->slug . '.' . $extension; // lấy tên slug  + phần mở rộng 
    //         $file->move($path_dir, $filename);
    //         $order->image = $filename;
    //     }
    //     //end upload file
    //     if ($order->save()) {
    //         $link = Link::where([['type', '=', 'order'], ['table_id', '=', $id]])->first();
    //         $link->slug = $order->slug;
    //         $link->save();
    //         return redirect()->route('order.index')->with('message', ['type' => 'success', 'msg' => 'Sửa mẫu tin thành công !']);
    //     } else
    //         return redirect()->route('order.index')->with('message', ['type' => 'danger', 'msg' => 'Sửa mẫu tin không thành công !']);
    // }

    

    

  
 
}

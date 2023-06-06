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
use PDF;

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
        $user_name = Auth::user()->name;
        $order = Order::find($id);
        $orderdetail  = Orderdetail::where('status', '!=', 0)
        ->whereIn('order_id',[$id])
        ->orderBy('created_at', 'desc')->get();
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
            $order->save();
            return redirect()->route('order.trash')->with('message', ['type' => 'success', 'msg' => 'Khôi phục thành công !']);
        }
    }

    public function Huy($id)
    {
        $order = Order::find($id);
        if ($order != null) {
        $order->status = 6;
        $order->save();
        return redirect()->route('order.index')->with('message', ['type' => 'success', 'msg' => 'Đơn hàng đã được hủy thành công!']);
        }
        else
        {
            return redirect()->route('order.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        }
    }

    public function Xacminh($id)
    {
        $order = Order::find($id);
        if ($order != null) {
        $order->status = 2;
        $order->save();
        return redirect()->route('order.index')->with('message', ['type' => 'success', 'msg' => 'Đơn hàng đã xác minh!']);
        }
        else
        {
            return redirect()->route('order.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        }
       
    }

    public function Vanchuyen($id)
    {
        $order = Order::find($id);
        if ($order != null) {
        $order->status = 3;
        $order->save();
        return redirect()->route('order.index')->with('message', ['type' => 'success', 'msg' => 'Đơn hàng đã được giao bởi đơn vị vận chuyển!']);
        }
        else
        {
            return redirect()->route('order.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        }
    }

    public function Thanhcong($id)
    {
        $order = Order::find($id);
        if ($order != null) {
        $order->status = 1;
        $order->save();
        return redirect()->route('order.index')->with('message', ['type' => 'success', 'msg' => 'Đơn hàng đã được giao thành công!']);
        }
        else
        {
            return redirect()->route('order.trash')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        }
    }

    public function Xuathoadon(string $id)
    {
        $order = Order::find($id);
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_customer_data_to_html($id));
        return $pdf->stream();
    }

    function convert_customer_data_to_html($id)
    {
        $user_name = Auth::user()->name;
        $order = Order::find($id);
        $orderdetail  = Orderdetail::join('vtl_product','vtl_product.id','=','vtl_order_detail.product_id')
        ->select('vtl_order_detail.*','vtl_product.name as pro')
        ->where('vtl_order_detail.status', '!=', 0)
        ->whereIn('order_id',[$id])
        ->orderBy('created_at', 'desc')->get();
        $output='';
        $output .= '
        <style>
                body{
                    font-family:DejaVu Sans;
                }
              </style>
              <table > 
              <tr>
              <td >
              Shoplaptop.com
              </td>
               
              </tr>
              </table>
        ';     
       
        $output .=' 
        <table width="100%" style="border-collapse: collapse; border: 0px;">
        <tr>
        <td style="border: 1px solid; padding:12px;" width="50%">
        <p style="font-weight: bold;">Từ:</p> 
           <p>Shopdientu</p>
           <p>Số điện thoại:0372177993</p>     
           <p>Email:laptopvui80@gmail.com</p>
        </td>
        <td style="border: 1px solid; padding:12px;" width="50%">
        <p style="font-weight: bold;">Đến:</p> 
           <p>Họ và tên KH:'.$order->fullname.'</p>
           <p>Số điện thoại: '.$order->phone.'</p>     
           <p>Email: '.$order->email.'</p>  
           <p>Địa chỉ người nhận:'.$order->district.' </p>  
        </td>
    </tr>
        </table> 
        ';
      
        $output .= '<style>
                body{
                    font-family:DejaVu Sans;
                }
              </style>   
             <table width="100%" style="border-collapse: collapse; border: 0px;">
             <thead>
             <tr>
                <th style="border: 1px solid; padding:12px;" width="45%">Tên SP</th>
                <th style="border: 1px solid; padding:12px;" width="10%">Đơn giá</th>
                <th style="border: 1px solid; padding:12px;" width="5%">SL</th>
                <th style="border: 1px solid; padding:12px;" width="20%">Thành tiền</th>
            </tr>
            <tr>
                <td style="border: 1px solid; text-align: center"; padding:12px;" width="45%">1</td>
                <td style="border: 1px solid; text-align: center"; padding:12px;" width="10%">2</td>
                <td style="border: 1px solid; text-align: center"; padding:12px;" width="5%">3</td>
                <td style="border: 1px solid; text-align: center"; padding:12px;" width="20%">2x3</td>
            </tr>
             </thead>
             <tbody>
             ';  
             $tong = 0;           
             foreach ($orderdetail as $product){
                $thanhtien = $product->price * $product->number;
                $tong +=$thanhtien;
                $output .= '
              <tr>           
              <td style="border: 1px solid; padding:12px;" width="30%">'.$product->pro.'</td>
              <td style="border: 1px solid; padding:12px;" width="15%">'.number_format($product->price, 0).'VNĐ</td>
              <td style="border: 1px solid; padding:12px; text-align: center"; width="15%">'.$product->number.'</td>
              <td style="border: 1px solid; padding:12px;" width="20%">'.number_format($thanhtien, 0).'VNĐ</td>
              </tr>
              ';
             }
            $output .='
            </tbody>
            </table>
            ';
           
            $output .='
            <table width="100%" style="border-collapse: collapse; border: 0px;"> 
            <tr>
            <td style="border: 1px solid; padding:12px;" width="75%">
            - Tiền thu người nhận:'.number_format($tong, 0).'VNĐ  <br>
            - Phí giao hàng: 0 VNĐ <br>
            - Hình thức thanh toán: Thanh toán bằng tiền mặt
            </td>
            <td style="border: 1px solid; padding:12px;" width="25%">
           Ngày đặt hàng: <br/>'.$order->created_at.' 
            </td>
            </tr>
            </table>        
            ';
            $output .= '<br/>';   
            $output .='
            <p style="text-align: center; font-style: italic; font-size: small;">Xin cảm ơn quý khách hàng đã tin tưởng và ủng hộ shop của chúng tôi.
              Nếu có bất cứ thông tin nào về sản phẩm của chúng tôi xin quý khách hàng liên hệ chúng tôi qua địa chỉ laptopvui80@gmail.com.Hoặc có thể liên hệ qua Hotline: +84 372 177 993
            </p>
            ';     
        return $output;
    }



 

}

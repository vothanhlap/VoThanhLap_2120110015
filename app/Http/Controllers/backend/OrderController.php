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
        if ($order == null) {
            return redirect()->route('order.index')->with('message', ['type' => 'danger', 'msg' => 'Mẫu tin không tồn tại !']);
        }
        if( $order->status = 1 ||  $order->status = 2){
            $order->status = 6;
            $order->save();
            return redirect()->route('order.index')->with('message', ['type' => 'success', 'msg' => 'Đơn hàng đã được hủy thành công!']);
        }
        else
        {
            return redirect()->route('order.index')->with('message', ['type' => 'danger', 'msg' => 'Thất bại !']);
        }
        
        
    }

    public function Xacminh($id)
    {
        
       
    }

    public function Vanchuyen($id)
    {
       echo 'Đơn hang đươc vân chuyển';

       var_dump();
    }

    public function Thanhcong($id)
    {
       echo 'Đơn hang đươc giao đến khách hàng thành công';
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
              <span>
                 Shopdientu.com
              </span>
              
             <h4 align="center">
             HÓA ĐƠN GIÁ TRỊ GIA TĂNG
             </br>(Bản thể hiện hóa đơn điện tử)
             </br>Ngày...Tháng...Năm...
             </h4>    
        ';
        
        $output .='
        
           <p>MKH: MKH0'.$order->cus_id.'</p> 
           <p>Họ và tên người mua:'.$order->fullname.'</p>
           <p>Số điện thoại: '.$order->phone.'</p>     
           <p>Email: '.$order->email.'</p>  
          
        ';
         $output .= '<br/>';

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
            $output .= '<br/>';
            $output .='
            <span style="font-weight: bold;" >Hình thức thanh toán:</span>Thanh toán khi nhân hàng </br>
            <span style="font-weight: bold;">Phí vận chuyển :</span>free ship </br>
            <span style="font-weight: bold;">Thành tiền: </span>'.number_format($tong, 0).'VNĐ
            ';
            $output .= '<br/>';
            $output .= '<br/>';
            $output .= '
            <table >
            <thead>
            <tr>
               <th width="200px">Người lập phiếu</th>
               <th width="800px">Người nhân</th>
           </tr>
            </thead>
            
            </table>
            ';
            $output .= '<br/>';
            $output .= '<br/>';
            $output .= '<br/>      
            <p style ="margin-left: 35px;">
             '.$user_name.'
             </p> 
            ';
            
            $output .='
            <p style="text-align: center; font-style: italic; font-size: small;">Xin cảm ơn quý khách hàng đã tin tưởng và ủng hộ shop của chúng tôi.
              Nếu có bất cứ thông tin nào về sản phẩm của chúng tôi xin quý khách hàng liên hệ chúng tôi qua địa chỉ laptopvui80@gmail.com.
            </p>
            ';
         
          
        return $output;
    }



 

}

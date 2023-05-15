<div style="width:600px; margin: 0 auto;">
   <div style="text-align: center;">
    <h2>Xin chào {{$auth->fullname}}</h2>
    <p>Bạn đã đặt hàng tại hệ thống của chúng tôi,vui lòng kiểm tra lại thông tin đơn hàng của bạn và nhấn vào nút xác nhận đơn hàng.</p>
    <p>
        <a href="">Xác nhận đơn hàng của bạn</a>
    </p>
   </div>
    <div class="row">
            <h3>Thông tin người nhận:</h3>
           <div>
            <table border="1" cellspacing='0' cellspacing='10' style="width:100%;">
                <tr style="width:30px">
                    <td>Tên người nhân</td>
                    <td>{{$order->fullname}}</td>
                </tr>
                <tr style="width:30px">
                    <td>Email</td>
                    <td>{{$order->email}}</td>
                </tr>
                <tr style="width:30px">
                    <td>Số điện thoại</td>
                    <td>{{$order->phone}}</td>
                </tr>
                <tr style="width:30px"> 
                    <td>Địa chỉ</td>
                    <td>{{$order->address}}</td>
                </tr>
            </table>
           </div>
            <h2>Thông tin sản phẩm</h2>
            <table border="1" cellspacing='0' cellspacing='10' style="width:100%;">
               <thead>
                <tr>
                    <th>Mã SP</th>
                    <th>Tên SP</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                </tr>
               </thead>
               <tbody>
                @foreach (Session::get("Cart")->products as $item)
              
                <tr>
                    <td>MSP1000{{$item['productinfo']->id}}</td>
                    <td>{{$item['productinfo']->name}}</td>
                    <td style="text-align: center">{{ $item['soluong'] }}</td>
                    <td>{{ number_format($item['productinfo']->price_buy) }} VNĐ</td>
                    <td>{{number_format(($item['soluong']) *($item['productinfo']->price_buy))}} VNĐ</td>
                </tr>

                @endforeach
               </tbody>
                   <tfoot>
                    <tr>
                        <th colspan="3">
                            <td>Tổng tiền</td>
                            <td>{{ number_format(Session::get("Cart")->tonggia, 0) }}</td>

                        </th>
                    </tr>
                </tfoot>
            </table>
    </div>
</div>
@extends('layouts.admin')
@section('title', 'Chi tiết đơn hàng')
@section('content')
    {{-- <div class="content-wrapper">
        <!-- Content Header (order header) -->
        <!-- Main content -->
        <section class="content py-3">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <strong class="text-danger text-uppercase"> chi tiết đơn hàng </strong>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('order.index') }}"class="btn btn-sm btn-info">
                                <i class="fas fa-long-arrow-alt-left"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
                
                {{-- <div class="card-body">
                    @includeIf('backend.message_alert')
                    <h3 style="color:#f016f0">THÔNG TIN KHÁCH HÀNG</h3>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>Mã Khách Hàng</td>
                            <td>{{ $order->cus_id  }}</td>
                        </tr>
                        <tr>
                            <td>Họ Tên Khách Hàng</td>
                            <td>
                                {{ $order->fullname}}
                            </td>

                        </tr>
                    </table>
                    <h3 class="py-3" style="color:#f016f0">CHI TIẾT ĐƠN HÀNG</h3>
                    @php
                        $tong =0;
                    @endphp
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th class="text-center" style="width:100px">Hình </th>
                                <th>Tên Sản phẩm</th>
                                <th>Giá Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Thành Tiền</th>
                                <th>ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                          @foreach ($orderdetail as $item)
                          @php
                          $sanpham = $order->sanpham;
                          $namepro = 'san pham A';
                          $namepro = $sanpham->name;
                          @endphp
                            @php
                            $arr_image = $orderdetail->productimg;
                            $image = 'hinh.png';
                            if (count($arr_image) > 0) {
                                $image = $arr_image[0]['image'];
                            }
                        @endphp
                      

                          <tr> 
                            <td>1</td>
                            <td class="text-center" style="width:100px;">
                            <img class="img-fluid" src="{{ asset('images/product/' . $image) }}" alt="{{ $image }}">
                            </td>
                            <td>{{$namepro}}</td>
                            <td>{{number_format($orderdetail->price,0)}} VNĐ</td>
                            <td>{{$orderdetail->number}}</td>
                            <td>{{number_format(($orderdetail->number)*($orderdetail->price),0)}} VNĐ</td>
                             <td>{{$orderdetail->id}}</td>
                        </tr>
                          @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4" class="text-center py-2">
                                    <a href="{{ route('order.huy', ['order' => $order->id]) }}" class="btn btn-sm btn-danger " style="margin-right:5px">
                                        <i class="fas fa-window-close"></i>
                                        Hủy
                                    </a>
                                    <a href="{{ route('order.xacminh', ['order' => $order->id]) }}" class="btn btn-sm btn-primary " style="margin-right:5px">
                                        <i class="fas fa-address-card"></i>
                                        Xác Minh
                                    </a>
                                    <a href="{{ route('order.vanchuyen', ['order' => $order->id]) }}" class="btn btn-sm btn-info" style="margin-right:5px">
                                        <i class="fas fa-bus-alt"></i>
                                        Vận Chuyển
                                    </a>
                                    <a href="{{ route('order.thanhcong', ['order' => $order->id]) }}" class="btn btn-sm btn-success">
                                        <i class="fas fa-check-circle"></i>
                                        Thành Công
                                    </a>
                                    <a href="{{ route('order.xuathoadon', ['order' => $order->id]) }}" class="btn btn-sm btn-success">
                                        
                                        Xuất Hóa Đơn
                                    </a>
                                </th>
                                <th>Tổng Tiền</th>
                            </tr>
                        </tfoot>
                    </table>
                </div> 

                <!-- /.card-footer-->
            </div>
            <!-- /.card -->


        </section>
        <!-- /.content -->
    </div> --}}
@endsection

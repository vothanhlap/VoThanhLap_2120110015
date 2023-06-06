@extends('layouts.admin')
@section('title', 'Chi tiết đơn hàng')
@extends('backend.dashboard.menuadmin')
@section('content')
    <div class="content-wrapper">
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
                @php
                $khachhangname = $order->khachhangname;
                $address = 'Nguyen Van A';
                $address = $khachhangname->address;
                @endphp
                <div class="card-body">
                    @includeIf('backend.message_alert')
                    <h3 style="color:#f016f0">THÔNG TIN KHÁCH HÀNG</h3>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>Mã Khách Hàng</td>
                            <td>MKH 0{{ $order->cus_id }}</td>
                        </tr>
                        <tr>
                            <td>Họ Tên Khách Hàng</td>
                            <td>
                                {{ $order->fullname }}
                            </td>
                        </tr>
                        <tr>
                            <td>Địa chỉ Khách Hàng</td>
                            <td>
                               {{$address}}
                            </td>
                        </tr>
                    </table>
                    <h3 class="py-3" style="color:#f016f0">CHI TIẾT ĐƠN HÀNG</h3>
                    @php
                        $tong = 0;
                    @endphp
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>

                            <tr >
                                <th class="text-center" style="width:100px">Hình </th>
                                <th class="text-center">Tên Sản phẩm</th>
                                <th class="text-center">Giá Sản Phẩm</th>
                                <th style="with:50px" class="text-center">Số Lượng</th>
                                <th class="text-center">Thành Tiền</th>
                                {{-- <th class="text-center">ID</th> --}}
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderdetail as $item)
                           @php
                           // Hinh
                                    $arr_image = $item->productimg;
                                    $image = 'hinh.png';
                                    if (count($arr_image) > 0) {
                                        $image = $arr_image[0]['image'];
                                    }  
                                    //san pham 
                                    $sanpham = $item->sanpham;
                                    $namepro = 'san pham A';
                                    $namepro = $sanpham->name;
                         //tong tien don hang
                                    $tong += ($item->amount );
                                @endphp        
                                <tr>
                                    <td class="text-center" style="width:100px;">
                                      
                                        <img class="img-fluid" src="{{ asset('images/product/' . $image) }}" alt="{{ $image }}">
                                        </td>
                                    <td class="text-start">{{$namepro}}</td>
                                    <td class="text-center" style="width:180px;">{{ number_format($item->price, 0) }} VNĐ</td>
                                    <td class="text-center" style="width:100px;">{{ $item->number }}</td>
                                    <td class="text-center" style="width:180px;">{{ number_format($item->amount, 0) }} VNĐ</td>
                                    {{-- <td class="text-center"style="width:40px;">{{ $item->id }}</td> --}}
                                </tr>           
                            @endforeach
                            
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-center py-2">
                                    <a href="{{ route('order.huy', ['order' => $order->id]) }}"
                                        class="btn btn-sm btn-danger " style="margin-right:5px">
                                        <i class="fas fa-window-close"></i>
                                        Hủy
                                    </a>
                                    <a href="{{ route('order.xacminh', ['order' => $order->id]) }}"
                                        class="btn btn-sm btn-primary " style="margin-right:5px">
                                        <i class="fas fa-address-card"></i>
                                        Xác Minh
                                    </a>
                                    <a href="{{ route('order.vanchuyen', ['order' => $order->id]) }}"
                                        class="btn btn-sm btn-info" style="margin-right:5px">
                                        <i class="fas fa-bus-alt"></i>
                                        Vận Chuyển
                                    </a>
                                    <a href="{{ route('order.thanhcong', ['order' => $order->id]) }}"
                                        class="btn btn-sm btn-success">
                                        <i class="fas fa-check-circle"></i>
                                        Thành Công
                                    </a>
                                    <a target="_blank" href="{{ route('order.xuathoadon', ['order' => $order->id]) }}"
                                        class="btn btn-sm btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                          </svg>
                                        In hóa đơn
                                    </a>
                                </th>
                                <th></th>
                                <th class="text-center text-danger">{{number_format($tong),0}} VND</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
@endsection

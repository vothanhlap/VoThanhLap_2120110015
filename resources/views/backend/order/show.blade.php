@extends('layouts.admin')
@section('title', 'Chi tiết đơn hàng')
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
                            <strong class="text-danger text-uppercase" > chi tiết đơn hàng </strong>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('order.index') }}"class="btn btn-sm btn-info">
                                <i class="fas fa-long-arrow-alt-left"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                    
                </div>
                <!-- /.card-body -->
                <div class="card-body">
                    @includeIf('backend.message_alert')
                    <h3 style="color:#f016f0">THÔNG TIN KHÁCH HÀNG</h3>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td>Mã Khách Hàng</td>
                            <td>{{$order->user_id}}</td>
                        </tr>
                        <tr>
                            <td>Họ Tên Khách Hàng</td>
                            <td>
                               {{$order->uname}}
                            </td>
    
                        </tr>
                    </table>
                    <h3 class="py-3" style="color:#f016f0">CHI TIẾT ĐƠN HÀNG</h3>
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th class="text-center" style="width:180px">Hình Sản phẩm</th>
                                <th>Tên Sản phẩm</th>
                                <th>Giá Sản Phẩm</th>
                                <th>Số Lượng</th>
                                <th>Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                         
                            {{-- @foreach ($collection as $item)
                                
                            @endforeach --}}

                        </tbody>
                    </table>
                </div>
               
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
            

        </section>
        <!-- /.content -->
    </div>
@endsection

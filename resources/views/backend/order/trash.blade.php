@extends('layouts.admin')
@section('title', 'thùng rác  đơn hàng')
@section('header')
<link rel="stylesheet" href="{{ asset('public/jquery.dataTables.min.css') }}">
@endsection
@section('footer')
    <script src="{{ asset('public/jquery.dataTables.min.js') }}"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
@endsection
@extends('backend.dashboard.menuadmin')
@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content my-3">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <strong class="text-danger text-uppercase">THÙNG RÁC ĐƠN HÀNG</strong>
                    </div>
                    <div class="col-md-6 text-right">       
                                <a href="{{ route('order.index') }}"class="btn btn-sm btn-success">
                                    <i class="fas fa-long-arrow-alt-left"></i> Quay về danh sách
                                </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @includeIf('backend.message_alert')
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th style="width:30px" class="text-center">#</th>
                                <th style="width:100px" class="text-center">Tên Khách hàng</th>
                                <th style="width:100px" class="text-center">Tên sản phẩm</th>
                                <th style="width:100px" class="text-center">Ngày đặt hàng</th>
                                <th style="width:120px" class="text-center">Chức năng</th>
                                <th style="width:30px" class="text-center">ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_order as $order)
                                <tr>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>{{$order->uname}}</td>
                                    <td class="text-center align-middle">{{ $order->prname }}</td>
                                    <td class="text-center align-middle">{{ $order->created_at }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('order.restore', ['order' => $order->id]) }}"
                                            class="btn btn-sm btn-success"><i class="fas fa-undo"></i></a>
                                        <a href="{{ route('order.destroy', ['order' => $order->id]) }}"
                                            class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> </a>
                                    </td>
                                    <td>{{ $order->id }}</td>
                                </tr>
                            @endforeach
    
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- /.card-body -->

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection


     {{-- <!-- Content Header (order header) -->
     <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh mục sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Tất cả danh mục sản phẩm</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-sm btn-danger" type="submit">
                            <i class="far fa-file-times"></i>Xóa</button>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('order.index') }}"class="btn btn-sm btn-success">
                            <i class="fas fa-long-arrow-alt-left"></i> Quay về danh sách
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                @includeIf('backend.message_alert')
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width:30px" class="text-center">#</th>
                            <th style="width:90px" class="text-center">Hình đại diện</th>
                            <th>Tên danh mục</th>
                            <th>slug</th>
                            <th>Ngày đăng</th>
                            <th style="width:280px" class="text-center">Chức năng</th>
                            <th style="width:30px" class="text-center">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_order as $order)
                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <img class="img-fluid" src="{{ asset('images/order/' . $order->image) }}"
                                        alt="{{ $order->image }}">
                                </td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->slug }}</td>
                                <td class="text-center">{{ $order->created_at }}</td>
                                <td class="text-center">
                                    <a href="{{ route('order.restore', ['order' => $order->id]) }}"
                                        class="btn btn-sm btn-success"><i class="fas fa-undo"></i></a>
                                    <a href="{{ route('order.destroy', ['order' => $order->id]) }}"
                                        class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> </a>
                                </td>
                                <td>{{ $order->id }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content --> --}}
@extends('layouts.admin')
@section('title', 'Chi tiết đơn hàng')
@section('header')
    <link rel="stylesheet" href="{{ asset('public/jquery.dataTables.min.css') }}">
@endsection
@section('footer')
    <script src="{{ asset('public/jquery.dataTables.min.js') }}"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
@endsection
@section('content')
    <!-- Content Wrapper. Contains order content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content my-3">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <strong class="text-danger text-uppercase">CHI TIẾT ĐƠN HÀNG</strong>
                        </div>
                        <div class="col-md-6 text-right">
                            
                            <a href="{{ route('order.trash') }}"class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Thùng rác
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
                                <th style="width:150px" class="text-center">Tên sản phẩm</th>
                                <th style="width:150px" class="text-center">Tên Khách hàng</th>
                                <th style="width:150px" class="text-center">Email</th>
                                <th style="width:150px" class="text-center">Số điện thoại</th>
                                <th style="width:120px" class="text-center">Ngày đặt hàng</th>
                                <th style="width:10px" class="text-center">ID</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

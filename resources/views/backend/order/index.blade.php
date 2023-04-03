@extends('layouts.admin')
@section('title', 'Tất cả đơn hàng')
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
                        <strong class="text-danger text-uppercase">TẤT CẢ ĐƠN HÀNG</strong>
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
                                <td  class="text-center align-middle">
                                    <input type="checkbox">
                                </td>
                               
                                <td>{{$order->uname}}</td>
                                <td class="text-center align-middle">{{ $order->prname }}</td>
                                <td class="text-center align-middle">{{ $order->created_at }}</td>
                                <td class="text-center align-middle">
                                    @if ($order->status == 1)
                                        <a href="{{ route('order.status', ['order' => $order->id]) }}"
                                            class="btn btn-sm btn-success"><i class="fas fa-toggle-on"></i> </a>
                                    @else
                                        <a href="{{ route('order.status', ['order' => $order->id]) }}"
                                            class="btn btn-sm btn-danger"><i class="fas fa-toggle-off"></i> </a>
                                    @endif

                                    {{-- <a href="{{ route('order.edit', ['order' => $order->id]) }}"
                                        class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a> --}}
                                    <a href="{{ route('order.show', ['order' => $order->id]) }}"
                                        class="btn btn-sm btn-info"><i class="far fa-eye"></i></a>
                                    <a href="{{ route('order.delete', ['order' => $order->id]) }}"
                                        class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                                <td class="text-center align-middle">{{ $order->id }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@extends('layouts.admin')
@section('title', 'tất cả khách hàng')
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
     <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content my-3">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <strong class="text-danger text-uppercase">TẤT CẢ KHÁCH HÀNG</strong>
                    </div>
                   
                </div>
            </div>
            <div class="card-body">
                @includeIf('backend.message_alert')
                <table class="table table-bordered table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th style="width:10px" class="text-center">#</th>
                            <th style="width:120px"  class="text-center">Tên khách hàng</th>
                        
                            <th style="width:100px" class="text-center">Số điện thoại</th>
                            <th style="width:100px"  class="text-center">Email</th>
                            <th style="width:180px" class="text-center">Chức năng</th>
                            <th style="width:10px" class="text-center">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_customer as $customer)
                            <tr>
                                <td  class="text-center align-middle">
                                    <input type="checkbox">
                                </td>
                               
                                <td class=" align-middle">{{ $customer->fullname }}</td>
                               
                                <td class="align-middle">{{ $customer->phone}}</td>
                                <td class=" align-middle">{{ $customer->email}}</td>
                                
                                <td class="text-center align-middle">
                                    @if ($customer->status == 1)
                                        <a href="{{ route('customer.status', ['customer' => $customer->id]) }}"
                                            class="btn btn-sm btn-success"><i class="fas fa-toggle-on"></i> </a>
                                    @else
                                        <a href="{{ route('customer.status', ['customer' => $customer->id]) }}"
                                            class="btn btn-sm btn-danger"><i class="fas fa-toggle-off"></i> </a>
                                    @endif

                                    <a href="{{ route('customer.edit', ['customer' => $customer->id]) }}"
                                        class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('customer.show', ['customer' => $customer->id]) }}"
                                        class="btn btn-sm btn-success"><i class="far fa-eye"></i></a>
                                    <a href="{{ route('customer.destroy', ['customer' => $customer->id]) }}"
                                        class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                                <td class="text-center align-middle">{{ $customer->id }}</td>
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

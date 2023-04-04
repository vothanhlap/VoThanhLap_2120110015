@extends('layouts.admin')
@section('title', 'thùng rác menu')
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
   <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content my-3">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <strong class="text-danger text-uppercase">THÙNG RÁC MENU</strong>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('menu.index') }}"class="btn btn-sm btn-success">
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
                            <th style="width:100px" class="text-center">Tên menu</th>
                            <th style="width:100px" class="text-center">slug</th>
                            <th style="width:100px" class="text-center">Người tạo</th>
                            <th style="width:100px" class="text-center">Ngày đăng</th>
                            <th style="width:150px" class="text-center">Chức năng</th>
                            <th style="width:30px" class="text-center">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_menu as $menu)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox">
                                </td>
                                
                                <td class="text-center">{{ $menu->name }}</td>
                                <td class="text-center">{{ $menu->link }}</td>
                                <td class="text-center">{{ $menu->created_by }}</td>
                                <td class="text-center">{{ $menu->created_at }}</td>
                                <td class="text-center">
                                    <a href="{{ route('menu.restore', ['menu' => $menu->id]) }}"
                                        class="btn btn-sm btn-success"><i class="fas fa-undo"></i></a>
                                    <a href="{{ route('menu.destroy', ['menu' => $menu->id]) }}"
                                        class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> </a>
                                </td>
                                <td class="text-center">{{ $menu->id }}</td>
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

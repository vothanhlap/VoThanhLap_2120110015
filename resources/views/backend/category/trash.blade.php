@extends('layouts.admin')
@section('title', 'thùng rác danh mục sản phẩm')
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
                        <strong class="text-danger text-uppercase">THÙNG RÁC DANH MỤC SẢN PHẨM</strong>
                    </div>
                    <div class="col-md-6 text-right">       
                                
                                <a href="{{ route('category.index') }}"class="btn btn-sm btn-success">
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
                                <th style="width:90px" class="text-center">Hình đại diện</th>
                                <th style="width:100px" class="text-center">Tên danh mục</th>
                                <th style="width:100px" class="text-center">slug</th>
                                <th style="width:100px" class="text-center">Ngày đăng</th>
                                <th style="width:150px" class="text-center">Chức năng</th>
                                <th style="width:30px" class="text-center">ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_category as $category)
                                <tr>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <img class="img-fluid" src="{{ asset('images/category/' . $category->image) }}"
                                            alt="{{ $category->image }}">
                                    </td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td class="text-center">{{ $category->created_at }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('category.restore', ['category' => $category->id]) }}"
                                            class="btn btn-sm btn-success"><i class="fas fa-undo"></i></a>
                                        <a href="{{ route('category.destroy', ['category' => $category->id]) }}"
                                            class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> </a>
                                    </td>
                                    <td>{{ $category->id }}</td>
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

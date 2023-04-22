@extends('layouts.admin')
@section('title', 'Thùng rác sản phẩm')
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
        <section class="content my-3">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <strong class="text-danger text-uppercase">THÙNG RÁC SẢN PHẨM</strong>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('product.index') }}"class="btn btn-sm btn-info">
                                <i class="fas fa-long-arrow-alt-left"></i> Quay lại danh sách
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @includeIf('backend.message_alert')
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th style="width:10px;" class="text-center"> #</th>
                                <th class="text-center" style="width:80px;">Hình ảnh</th>
                                <th class="text-center">Tên sản phẩm</th>
                                <th class="text-center">Loại sản phẩm</th>
                                <th class="text-center">Thương hiệu</th>
                                <th class="text-center">Ngày đăng</th>
                                <th class="text-center">Chức năng</th>
                                <th style="width:20px;" class="text-center">ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_product as $product)
                                <tr>
                                    <td class="text-center align-middle"><input type="checkbox"></td>
                                    @php
                                        $arr_image = $product->productimg;
                                        $image = 'hinh.png';
                                        if (count($arr_image) > 0) {
                                            $image = $arr_image[0]['image'];
                                        }
                                    @endphp
                                    <td><img class="img-fluid" src="{{ asset('images/product/' .  $image) }}"
                                            alt="{{ $image}}"></td>
                                    <td class="text-center align-middle">{{ $product->name }}</td>
                                    <td class="text-center align-middle">{{ $product->catname }}</td>
                                    <td class="text-center align-middle">{{ $product->braname }}</td>
                                    <td class="text-center align-middle">{{ $product->created_at }}</td>
                                    <td class="text-center align-middle">
                                        <a href="{{ route('product.restore', ['product' => $product->id]) }}"
                                            class="btn btn-sm btn-success"><i class="fas fa-undo"></i></a>
                                        <a href="{{ route('product.destroy', ['product' => $product->id]) }}"
                                            class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> </a>
                                    </td>
                                    <td class="text-center align-middle">{{ $product->id }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->

        </section>
    </div>
    <!-- /.content-wrapper -->

@endsection

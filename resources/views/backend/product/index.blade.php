@extends('layouts.admin')
@section('title', 'Tất cả sản phẩm')
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

    <div class="content-wrapper">
        <section class="content my-3">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <strong class="text-danger text-uppercase">TẤT CẢ SẢN PHẨM</strong>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{ route('product.create') }}"class="btn btn-sm btn-success">
                                <i class="fas fa-plus"></i> Thêm
                            </a>
                            <a href="{{ route('product.trash') }}"class="btn btn-sm btn-danger">
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
                                @php
                                    $arr_image = $product->productimg;
                                    $image = 'hinh.png';
                                    if (count($arr_image) > 0) {
                                        $image = $arr_image[0]['image'];
                                    }
                                @endphp
                                <tr>
                                    <td class="text-center"><input type="checkbox"></td>
                                    <td>
                                        <img class="img-fluid" src="{{ asset('images/product/' . $image) }}"
                                            alt="{{ $image }}">
                                    </td>
                                    <td class="align-middle">{{ $product->name }}</td>
                                  
                                    <td class="text-center align-middle">{{ $product->catname }}</td> 
                                    <td class="text-center align-middle">{{ $product->braname }}</td>
                                    <td class="text-center align-middle">{{ $product->created_at }}</td>
                                    <td class="text-center align-middle">
                                        @if ($product->status == 1)
                                            <a href="{{ route('product.status', ['product' => $product->id]) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="fas fa-toggle-on">
                                                </i>
                                            </a>
                                        @else
                                            <a href="{{ route('product.status', ['product' => $product->id]) }}"
                                                class="btn btn-danger btn-sm">
                                                <i class="fas fa-toggle-off">
                                                </i>
                                            </a>
                                        @endif

                                        <a href="{{ route('product.show', ['product' => $product->id]) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye">
                                            </i>
                                        </a>
                                        <a href="{{ route('product.edit', ['product' => $product->id]) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('product.delete', ['product' => $product->id]) }}"
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash">
                                            </i>
                                        </a>
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

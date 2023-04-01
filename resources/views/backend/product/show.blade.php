@extends('layouts.admin')
@section('title', 'Chi tiết sản phẩm')
@section('content')
<div class="content-wrapper">
      <!-- Main content -->
      <section class="content py-3">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <strong class="text-danger text-uppercase" >Chi tiết sản phẩm</strong>
                    </div>
                    <div class="col-md-6 text-right">
                        <a
                            href="{{ route('product.edit', ['product' => $product->id]) }}"class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                        <a
                            href="{{ route('product.destroy', ['product' => $product->id]) }}"class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Xóa
                        </a>
                        <a href="{{ route('product.index') }}"class="btn btn-sm btn-success">
                            <i class="fas fa-long-arrow-alt-left"></i> Quay về danh sách
                        </a>
                    </div>
                </div>
                
            </div>
            <!-- /.card-body -->
            <div class="card-body">
                @includeIf('backend.message_alert')
                <table class="table table-bordered">
                    <tr>
                        <th style="width:200px;color:red;text-align:center">Tiêu Đề</th>
                        <th style="color:green;text-align:center">Nội Dung</th>
                    </tr>
                    <td>Hình ảnh</td>
                        <td>
                            <img style="width:80px" class="img-fluid" src="{{ asset('images/product/' . $product->image) }}"
                                alt="{{ $product->image }}">
                        </td>
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <td>Slug</td>
                        <td>{{ $product->slug }}</td>
                    </tr>
                    <tr>
                        <td>Loại sản phẩm</td>
                        <td>{{ $product->slug}}</td>
                    </tr>
                    <tr>
                      <td>Thương hiệu</td>
                      <td>{{ $product->slug}}</td>
                  </tr>
                    <tr>
                        <td>Từ khóa</td>
                        <td>{{ $product->metakey }}</td>
                    </tr>
                    <tr>
                        <td>Mô tả</td>
                        <td>{{ $product->metadesc }}</td>
                    </tr>
                    <tr>
                      <td>Chi tiết sản phẩm</td>
                      <td>{{ $product->detail }}</td>
                  </tr>
                  <tr>
                    <td>Số lượng</td>
                    <td>{{ $product->soluong }}</td>
                  </tr>
                  <tr>
                    <td>Gía bán</td>
                    <td>{{ $product->price_buy }}</td>
                  </tr>
                  <tr>
                    <td>Gía khuyến mãi</td>
                    <td>{{ $product->price_sale }}</td>
                  </tr>
                    <tr>
                        <td>Người tạo</td>
                        <td>{{ $product->created_by }}</td>
                    </tr>
                    <tr>
                        <td>Người cập nhật</td>
                        <td>{{ $product->updated_by }}</td>
                    </tr>
                    <tr>
                        <td>Ngày tạo</td>
                        <td>{{ $product->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Ngày cập nhật</td>
                        <td>{{ $product->updated_at }}</td>
                    </tr>
                </table>
            </div>
           
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        

    </section>
    <!-- /.content -->
</div>
  @endsection

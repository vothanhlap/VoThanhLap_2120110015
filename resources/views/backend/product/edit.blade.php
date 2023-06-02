@extends('layouts.admin')
@section('title', 'Cập nhật sản phẩm')
@extends('backend.dashboard.menuadmin')
@section('content')

    <form action="{{ route('product.update', ['product' => $product->id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content py-3">
                <!-- Default box -->
                <div class="card">
                  <div class="card-header">
                      <div class="row">
                          <div class="col-md-6">
                              <strong class="text-danger text-uppercase">CẬP NHẬT SẢN PHẨM</strong>
                          </div>
                          <div class="col-md-6 text-right">
                              <button type="submit" class="btn btn-sm btn-success">
                                  <i class="fas fa-save"></i> Lưu[Cập nhật]
                              </button>
                              <a href="{{ route('product.index') }}"class="btn btn-sm btn-info">
                                  <i class="fas fa-long-arrow-alt-left"></i> Quay lại danh sách
                              </a>
                          </div>
                      </div>
                  </div>

                  <div class="card-body">
                      @includeIf('backend.message_alert')
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                          <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="productinfo-tab" data-toggle="tab"
                                  data-target="#productinfo" type="button" role="tab" aria-controls="productinfo"
                                  aria-selected="true">Thông tin sản phẩm</button>
                          </li>
                          <li class="nav-item" role="presentation">
                              <button class="nav-link" id="productimage-tab" data-toggle="tab"
                                  data-target="#productimage" type="button" role="tab"
                                  aria-controls="productimage" aria-selected="false">Hình ảnh</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="nav-link" id="productattribute-tab" data-toggle="tab"
                                data-target="#productattribute" type="button" role="tab"
                                aria-controls="productattribute" aria-selected="false">Thuôc tính</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="productsale-tab" data-toggle="tab" data-target="#productsale"
                                type="button" role="tab" aria-controls="productsale" aria-selected="false">Khuyến
                                mãi</button>
                        </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active border-right border-bottom border-left p-3"
                              id="productinfo" role="tabpanel" aria-labelledby="productinfo-tab">
                              @includeIf('backend.product.tab_edit_productinfo')</div>
                          <div class="tab-pane fade border-right border-bottom border-left p-3" id="productimage"
                              role="tabpanel" aria-labelledby="productimage-tab">
                              @includeIf('backend.product.tab_edit_productimage')</div>
                              <div class="tab-pane fade border-right border-bottom border-left p-3" id="productattribute"
                                role="tabpanel" aria-labelledby="productattribute-tab">
                                @includeIf('backend.product.tab_edit_productattribute')</div>
                                <div class="tab-pane fade border-right border-bottom border-left p-3" id="productsale"
                                role="tabpanel" aria-labelledby="productsale-tab">
                                @includeIf('backend.product.tab_edit_productsale')</div>
                         
                        
                      </div>
                  </div>

                    <!-- /.card-body -->

                    <!-- /.card-footer-->
                  </div>
                  <!-- /.card-body -->
                  <!-- /.card-footer-->
              </div>
              <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </form>
@endsection
{{-- @section('footer')
<script type="text/javascript" src="{{ asset('public/dist/ckeditor/ckeditor.js') }}"></script>
    <script>
          CKEDITOR.replace('ckeditor7')
          CKEDITOR.replace('ckeditor8')
          CKEDITOR.replace('ckeditor9')
    </script>
@endsection --}}
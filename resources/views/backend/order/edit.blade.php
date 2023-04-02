@extends('layouts.admin')
@section('title', 'Cập nhật trang đơn')
@section('content')
    <form action="{{ route('order.update', ['order' => $order->id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="content-wrapper">
            <!-- Content Header (order header) -->
            <section class="content my-3">
                     <!-- Default box -->
                     <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                        <strong class="text-danger text-uppercase">CẬP NHẬT TRANG ĐƠN</strong>                
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn btn-sm btn-success">
                                        <i class="fas fa-save"></i> Lưu[Cập nhật]
                                    </button>
                                    <a href="{{ route('order.index') }}"class="btn btn-sm btn-info">
                                        <i class="fas fa-long-arrow-alt-left"></i> Quay về danh sách
                                    </a>
                                </div>
                            </div>
                        </div>
    
                        <div class="card-body">
                            @includeIf('backend.message_alert')
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="mb-3">
                                        <label for="title " class="text-danger">Tên trang đơn<span class="text-danger">(*)</span></label>
                                        <input type="text" name="title" value="{{ old('title', $order->title) }}"
                                            id="title" class="form-control" placeholder="Nhập tên trang đơn">
                                        @if ($errors->has('title'))
                                            <div class="text-danger">
                                                {{ $errors->first('title') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="metakey  " class="text-danger">Từ khóa <span class="text-danger">(*)</span></label>
                                        <textarea name="metakey" id="metakey" rows="4" class="form-control" placeholder="Từ khóa tìm kiếm">{{ old('metakey', $order->metakey) }}</textarea>
                                        @if ($errors->has('metakey'))
                                            <div class="text-danger">
                                                {{ $errors->first('metakey') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="metadesc" class="text-danger">Mô tả <span class="text-danger">(*)</span></label>
                                        <textarea name="metadesc" id="metadesc" rows="4" class="form-control" placeholder="Nhập mô tả">{{ old('metadesc', $order->metadesc) }}</textarea>
                                        @if ($errors->has('metadesc'))
                                            <div class="text-danger">
                                                {{ $errors->first('metadesc') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="detail">Chi tiết <span class="text-danger">(*)</span></label>
                                        <textarea name="detail" rows="3" id="metadesc" class="form-control" placeholder="Nhập mô tả">{{ old('detail', $order->detail) }}</textarea>
                                        @if ($errors->has('detail'))
                                            <div class="text-danger">
                                                {{ $errors->first('detail') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="parent_id" class="text-danger">Danh mục cha <span class="text-danger">(*)</span></label>
                                        <select class="form-control" name="parent_id" id="parent_id">
                                            <option value="0">-- Cấp cha --</option>
                                            {!! $html_parent_id !!}
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sort_order" class="text-danger">Vị trí sắp xếp <span class="text-danger">(*)</span></label>
                                        <select class="form-control" name="sort_order" id="sort_order">
                                            <option value="0">-- Vị trí --</option>
                                            {!! $html_sort_order !!}
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="text-danger">Hình đại diện <span class="text-danger">(*)</span></label>
                                        <input type="file" name="image" value="{{ old('image') }}" id="image"
                                            class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="text-danger">Trạng thái</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1">Xuất bản</option>
                                            <option value="0">Chưa xuất bản</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
            </section>

            <!-- Main content -->
            <!-- /.content -->
        </div>
    </form>
@endsection

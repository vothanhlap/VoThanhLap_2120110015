@extends('layouts.admin')
@section('title', 'Cập nhật mục sản phẩm')
@section('content')
    <form action="{{ route('contact.update', ['contact' => $contact->id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content my-3">
                     <!-- Default box -->
                     <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                        <strong class="text-danger text-uppercase">CẬP NHẬT DANH MỤC SẢN PHẨM</strong>                
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn btn-sm btn-success">
                                        <i class="fas fa-save"></i> Lưu[Cập nhật]
                                    </button>
                                    <a href="{{ route('contact.index') }}"class="btn btn-sm btn-info">
                                          <i class="fas fa-long-arrow-alt-left"></i> Quay lại danh sách
                                    </a>
                                </div>
                            </div>
                        </div>
    
                        <div class="card-body">
                            @includeIf('backend.message_alert')
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="mb-3">
                                        <label for="name " class="text-danger">Tên danh mục</label>
                                        <input type="text" name="name" value="{{ old('name', $contact->name) }}"
                                            id="name" class="form-control" placeholder="Nhập tên danh mục">
                                        @if ($errors->has('name'))
                                            <div class="text-danger">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="metakey  " class="text-danger">Từ khóa</label>
                                        <textarea name="metakey" id="metakey" rows="4" class="form-control" placeholder="Từ khóa tìm kiếm">{{ old('metakey', $contact->metakey) }}</textarea>
                                        @if ($errors->has('metakey'))
                                            <div class="text-danger">
                                                {{ $errors->first('metakey') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="metadesc" class="text-danger">Mô tả</label>
                                        <textarea name="metadesc" id="metadesc" rows="4" class="form-control" placeholder="Nhập mô tả">{{ old('metadesc', $contact->metadesc) }}</textarea>
                                        @if ($errors->has('metadesc'))
                                            <div class="text-danger">
                                                {{ $errors->first('metadesc') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="parent_id" class="text-danger">Danh mục cha</label>
                                        <select class="form-control" name="parent_id" id="parent_id">
                                            <option value="0">-- Cấp cha --</option>
                                            {!! $html_parent_id !!}
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sort_order" class="text-danger">Vị trí sắp xếp</label>
                                        <select class="form-control" name="sort_order" id="sort_order">
                                            <option value="0">-- Vị trí --</option>
                                            {!! $html_sort_order !!}
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="text-danger">Hình đại diện</label>
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

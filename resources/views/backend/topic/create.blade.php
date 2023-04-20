@extends('layouts.admin')
@section('title', 'Thêm chủ đề bài viết')
@section('content')
    <form action="{{ route('topic.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content my-3">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <strong class="text-danger text-uppercase">THÊM chủ đề bài viết</strong>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fas fa-save"></i> Lưu[Thêm]
                                </button>
                                <a href="{{ route('topic.index') }}"class="btn btn-sm btn-info">
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
                                    <label for="title">Tên chủ đề <span class="text-danger">(*)</span></label>
                                    <input type="text" name="title" value="{{ old('title') }}" id="title"
                                        class="form-control" placeholder="Nhập tên chủ đề">
                                    @if ($errors->has('title'))
                                        <div class="text-danger">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="metakey">Từ khóa <span class="text-danger">(*)</span></label>
                                    <textarea name="metakey" rows="3" id="ckeditor13" class="form-control" placeholder="Từ khóa tìm kiếm">{{ old('metakey') }}</textarea>
                                    @if ($errors->has('metakey'))
                                        <div class="text-danger">
                                            {{ $errors->first('metakey') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="metadesc">Mô tả <span class="text-danger">(*)</span></label>
                                    <textarea name="metadesc" rows="3" id="ckeditor14" class="form-control" placeholder="Nhập mô tả">{{ old('metadesc') }}</textarea>
                                    @if ($errors->has('metadesc'))
                                        <div class="text-danger">
                                            {{ $errors->first('metadesc') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="parent_id">Danh mục cha <span class="text-danger">(*)</span></label>
                                    <select class="form-control" name="parent_id" id="parent_id">
                                        <option value="0">-- Cấp cha --</option>
                                        {!! $html_parent_id !!}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="sort_order">Vị trí sắp xếp <span class="text-danger">(*)</span></label>
                                    <select class="form-control" name="sort_order" id="sort_order">
                                        <option value="0">-- Vị trí --</option>
                                        {!! $html_sort_order !!}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="image">Hình đại diện <span class="text-danger">(*)</span></label>
                                    <input type="file" name="image" value="{{ old('image') }}" id="image"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="status">Trạng thái</label>
                                    <select class="form-control" name="status" id="status">
                                        <option value="1">Xuất bản</option>
                                        <option value="0">Chưa xuất bản</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <!-- /.card-footer-->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
    </form>
@endsection

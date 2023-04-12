@extends('layouts.admin')
@section('title', 'Thêm slider')
@section('content')
    <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
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
                                <strong class="text-danger text-uppercase">THÊM SLIDER</strong>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fas fa-save"></i> Lưu[Thêm]
                                </button>
                                <a href="{{ route('slider.index') }}"class="btn btn-sm btn-info">
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
                                    <label for="name">Tên slider <span class="text-danger">(*)</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}" id="name"
                                        class="form-control" placeholder="Nhập tên slider">
                                    @if ($errors->has('name'))
                                        <div class="text-danger">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="link">Link <span class="text-danger">(*)</span></label>
                                    <textarea name="link" rows="1" id="link" class="form-control" placeholder="Nhập link">{{ old('link') }}</textarea>
                                    @if ($errors->has('link'))
                                        <div class="text-danger">
                                            {{ $errors->first('link') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="image">Hình đại diện <span class="text-danger">(*)</span></label>
                                    <input type="file" name="image" value="{{ old('image') }}" id="image"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-md-3">

                                <div class="mb-3">
                                    <label for="sort_order">Sắp xếp <span class="text-danger">(*)</span></label>
                                    <select class="form-control" name="sort_order" id="sort_order">
                                        <option value="0">-- Chọn vị trí sắp xếp --</option>
                                        {!! $html_sort_order !!}
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="position">Vị trí<span class="text-danger">(*)</span></label>
                                    <select class="form-control" name="position" id="position">
                                        <option value="slideshow">SlideShow</option>
                                        <option value="slidefooter">SlideFooter</option>
                                    </select>
                                    @if ($errors->has('position'))
                                        <div class="text-danger">
                                            {{ $errors->first('position') }}
                                        </div>
                                    @endif
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

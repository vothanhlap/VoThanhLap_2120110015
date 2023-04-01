@extends('layouts.admin')
@section('title', 'Cập nhật slider')
@section('content')
    <form action="{{ route('slider.update', ['slider' => $slider->id]) }}" method="post" enctype="multipart/form-data">
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
                                        <strong class="text-danger text-uppercase">CẬP NHẬT SLIDER</strong>                
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn btn-sm btn-success">
                                        <i class="fas fa-save"></i> Lưu[Cập nhật]
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
                                        <label for="name " class="text-danger">Tên slider</label>
                                        <input type="text" name="name" value="{{ old('name', $slider->name) }}"
                                            id="name" class="form-control" placeholder="Nhập tên slider">
                                        @if ($errors->has('name'))
                                            <div class="text-danger">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="link" class="text-danger">Link</label>
                                        <textarea name="link" id="link" rows="4" class="form-control" placeholder="Nhập link">{{ old('link', $slider->link) }}</textarea>
                                        @if ($errors->has('link'))
                                            <div class="text-danger">
                                                {{ $errors->first('link') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="position" class="text-danger">Mô tả</label>
                                        <textarea name="position" id="position" rows="4" class="form-control" placeholder="Nhập position">{{ old('position', $slider->position) }}</textarea>
                                        @if ($errors->has('position'))
                                            <div class="text-danger">
                                                {{ $errors->first('position') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
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

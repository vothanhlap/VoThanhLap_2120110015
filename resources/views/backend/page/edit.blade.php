@extends('layouts.admin')
@section('title', 'Cập nhật trang đơn')
@extends('backend.dashboard.menuadmin')
@section('content')
    <form action="{{ route('page.update', ['page' => $page->id]) }}" method="post" enctype="multipart/form-data">
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
                                        <strong class="text-danger text-uppercase">CẬP NHẬT TRANG ĐƠN</strong>                
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn btn-sm btn-success">
                                        <i class="fas fa-save"></i> Lưu[Cập nhật]
                                    </button>
                                    <a href="{{ route('page.index') }}"class="btn btn-sm btn-info">
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
                                        <input type="text" name="title" value="{{ old('title', $page->title) }}"
                                            id="title" class="form-control" placeholder="Nhập tên trang đơn">
                                        @if ($errors->has('title'))
                                            <div class="text-danger">
                                                {{ $errors->first('title') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="metakey  " class="text-danger">Từ khóa <span class="text-danger">(*)</span></label>
                                        <textarea name="metakey" id="ckeditor20" rows="4" class="form-control" placeholder="Từ khóa tìm kiếm">{{ old('metakey', $page->metakey) }}</textarea>
                                        @if ($errors->has('metakey'))
                                            <div class="text-danger">
                                                {{ $errors->first('metakey') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="metadesc" class="text-danger">Mô tả <span class="text-danger">(*)</span></label>
                                        <textarea name="metadesc" id="ckeditor21" rows="4" class="form-control" placeholder="Nhập mô tả">{{ old('metadesc', $page->metadesc) }}</textarea>
                                        @if ($errors->has('metadesc'))
                                            <div class="text-danger">
                                                {{ $errors->first('metadesc') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="detail">Chi tiết <span class="text-danger">(*)</span></label>
                                        <textarea name="detail" rows="3" id="ckeditor22" class="form-control" placeholder="Nhập mô tả">{{ old('detail', $page->detail) }}</textarea>
                                        @if ($errors->has('detail'))
                                            <div class="text-danger">
                                                {{ $errors->first('detail') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="topic_id" class="text-danger">Danh mục cha <span class="text-danger">(*)</span></label>
                                        <select class="form-control" name="topic_id" id="topic_id">
                                            <option value="{{ old('topic_id',$page->topic_id) }}">-- Cấp cha --</option>
                                            {!! $html_topic_id !!}
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
{{-- @section('footer')
<script type="text/javascript" src="{{ asset('public/dist/ckeditor/ckeditor.js') }}"></script>
    <script>
          CKEDITOR.replace('ckeditor20')
          CKEDITOR.replace('ckeditor21')
          CKEDITOR.replace('ckeditor22')
    </script>
@endsection --}}

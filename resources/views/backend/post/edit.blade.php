@extends('layouts.admin')
@section('title', 'Cập nhật bai viết')
@extends('backend.dashboard.menuadmin')
@section('content')
    <form action="{{ route('post.update', ['post' => $post->id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="content-wrapper">
            <!-- Content Header (post header) -->
            <!-- Main content -->
            <section class="content my-3">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <strong class="text-danger text-uppercase">Cập nhật bai viết</strong>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fas fa-save"></i> Lưu[Cập nhật]
                                </button>
                                <a href="{{ route('post.index') }}"class="btn btn-sm btn-info">
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
                                    <label for="title">Tên bai viết <span class="text-danger">(*)</span></label>
                                    <input type="text" name="title" value="{{ old('title',$post->title) }}" id="title"
                                        class="form-control" placeholder="Nhập bai viết">
                                    @if ($errors->has('title'))
                                        <div class="text-danger">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="mb-3">
                                    <label for="metakey">Từ khóa bài viết <span class="text-danger">(*)</span></label>
                                    <textarea id="ckeditor4" name="metakey" rows="2" id="metakey" class="form-control" placeholder="Từ khóa tìm kiếm">{{ old('metakey',$post->metakey) }}</textarea>
                                    @if ($errors->has('metakey'))
                                        <div class="text-danger">
                                            {{ $errors->first('metakey') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="metadesc">Mô tả ngắn <span class="text-danger">(*)</span></label>
                                    <textarea id="ckeditor5" name="metadesc" rows="2" id="metadesc" class="form-control" placeholder="Nhập mô tả">{{ old('metadesc',$post->metadesc) }}</textarea>
                                    @if ($errors->has('metadesc'))
                                        <div class="text-danger">
                                            {{ $errors->first('metadesc') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="detail">Chi tiết bài viết <span class="text-danger">(*)</span></label>
                                    <textarea id="ckeditor6" name="detail" rows="4" id="detail" class="form-control" placeholder="Nhập mô tả">{{ old('detail',$post->detail) }}</textarea>
                                    @if ($errors->has('detail'))
                                        <div class="text-danger">
                                            {{ $errors->first('detail') }}
                                        </div>
                                    @endif
                                </div>
                                
                            </div>
                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label for="top_id">Chủ đề bài viết<span class="text-danger">(*)</span></label>
                                    <select class="form-control" name="top_id" id="top_id">
                                        <option value="{{ old('top_id',$post->top_id)}}">-- Chọn chủ đề bài viết--</option>
                                        {!! $html_topic_id !!}
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="image">Hình đại diện <span class="text-danger">(*)</span></label>
                                    <input type="file" name="image"  value="{{ old('image',$post->image) }}" id="image" class="form-control"  > 
                                    @if ($errors->has('image'))
                                        <div class="text-danger">
                                            {{ $errors->first('image') }}
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
@section('footer')
<script type="text/javascript" src="{{ asset('public/dist/ckeditor/ckeditor.js') }}"></script>
    <script>
          CKEDITOR.replace('ckeditor4')
          CKEDITOR.replace('ckeditor5')
          CKEDITOR.replace('ckeditor6')
    </script>
@endsection

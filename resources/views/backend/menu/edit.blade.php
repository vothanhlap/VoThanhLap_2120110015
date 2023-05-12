@extends('layouts.admin')
@section('title', 'Cập nhật menu')
@extends('backend.dashboard.menuadmin')
@section('content')
    <form action="{{ route('menu.update', ['menu' => $menu->id]) }}" method="post" enctype="multipart/form-data">
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
                                        <strong class="text-danger text-uppercase">CẬP NHẬT DANH menu</strong>                
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn btn-sm btn-success">
                                        <i class="fas fa-save"></i> Lưu[Cập nhật]
                                    </button>
                                    <a href="{{ route('menu.index') }}"class="btn btn-sm btn-info">
                                          <i class="fas fa-long-arrow-alt-left"></i> Quay lại danh sách
                                    </a>
                                </div>
                            </div>
                        </div>
    
                        <div class="card-body">
                            @includeIf('backend.message_alert')
                            <div class="row">
                                <div class="col-md-9">
                                    @if ($menu->type != 'custom')
                                   <div class="mb-3">
                                    <label for="name ">Tên Menu <span class="text-danger">(*)</span></label>
                                    <input type="text" name="name" readonly value="{{ old('name', $menu->name) }}"
                                        id="name" class="form-control" placeholder="Nhập tên danh mục">
                                    @if ($errors->has('name'))
                                        <div class="text-danger">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="link" >Liên kiết <span class="text-danger">(*)</span></label>
                                    <input name="link" value="{{ old('link', $menu->link) }}" readonly id="link" rows="2" class="form-control" placeholder="Từ khóa tìm kiếm">
                                    @if ($errors->has('link'))
                                        <div class="text-danger">
                                            {{ $errors->first('link') }}
                                        </div>
                                    @endif
                                </div>
                                   @else
                                   <div class="mb-3">
                                    <label for="name ">Tên Menu <span class="text-danger">(*)</span></label>
                                    <input type="text" name="name" value="{{ old('name', $menu->name) }}"
                                        id="name" class="form-control" placeholder="Nhập tên danh mục">
                                    @if ($errors->has('name'))
                                        <div class="text-danger">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-3">
                                    <label for="link  " >Liên kiết <span class="text-danger">(*)</span></label>
                                    <textarea name="link" id="link" rows="2" class="form-control" placeholder="Từ khóa tìm kiếm">{{ old('link', $menu->link) }}</textarea>
                                    @if ($errors->has('link'))
                                        <div class="text-danger">
                                            {{ $errors->first('link') }}
                                        </div>
                                    @endif
                                </div>
                                   @endif
                                    <div class="mb-3">
                                        <label for="type" >Kiểu <span class="text-danger">(*)</span></label>
                                        <textarea name="type" id="type" rows="2" class="form-control" placeholder="Nhập mô tả">{{ old('type', $menu->type) }}</textarea>
                                        @if ($errors->has('type'))
                                            <div class="text-danger">
                                                {{ $errors->first('type') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label for="position">Vị trí<span class="text-danger">(*)</span></label>
                                        <select name="position" class="form-control">
                                            <option value="mainmenu">Mainmenu</option>
                                            <option value="footermenu">Footermenu</option>
                                        </select>
                                         </div>
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
                                        <label for="status" >Trạng thái</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="1" {{ ($menu->status==1)?'selected':''}}>Xuất bản</option>
                                             <option value="2" {{ ($menu->status==2)?'selected':''}}>Chưa xuất bản</option>
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

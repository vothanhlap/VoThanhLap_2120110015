@extends('layouts.admin')
@section('title', 'Cập nhật mục sản phẩm')
@extends('backend.dashboard.menuadmin')
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
                                        <strong class="text-danger text-uppercase">CẬP NHẬT liên hệ</strong>                
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
                                        <label for="name">Tên liên hệ<span class="text-danger">(*)</span></label>
                                        <input type="text" name="name" value="{{ old('name',$contact->name) }}" id="name"
                                            class="form-control" placeholder="Nhập tên liên hẹ">
                                        @if ($errors->has('name'))
                                            <div class="text-danger">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone">Số điện thoại<span class="text-danger">(*)</span></label>
                                        <input name="phone"  id="phone" value="{{ old('phone',$contact->phone) }}" class="form-control" placeholder="Nhập số điện thoại ">
                                        @if ($errors->has('phone'))
                                            <div class="text-danger">
                                                {{ $errors->first('phone') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Email<span class="text-danger">(*)</span></label>
                                        <input name="email"  id="email" value="{{ old('email',$contact->email) }}" class="form-control" placeholder="Nhập địa chỉ email ">
                                        @if ($errors->has('email'))
                                            <div class="text-danger">
                                                {{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>  
                                </div>
                                <div class="col-md-3">                                 
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
                    </div>
                    <!-- /.card -->
            </section>

            <!-- Main content -->
            <!-- /.content -->
        </div>
    </form>
@endsection

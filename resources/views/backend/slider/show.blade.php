@extends('layouts.admin')
@section('title', 'Chi tiết slider'.'-'.$slider->name)
@extends('backend.dashboard.menuadmin') class=" align-middle"
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content py-3">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <strong class="text-danger text-uppercase" >Chi tiết slider</strong>
                        </div>
                        <div class="col-md-6 text-right">
                            <a
                                href="{{ route('slider.edit', ['slider' => $slider->id]) }}"class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Sửa
                            </a>
                            <a
                                href="{{ route('slider.destroy', ['slider' => $slider->id]) }}"class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Xóa
                            </a>
                            <a href="{{ route('slider.index') }}"class="btn btn-sm btn-success">
                                <i class="fas fa-long-arrow-alt-left"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                    
                </div>
                <!-- /.card-body -->
                <div class="card-body">
                    @includeIf('backend.message_alert')
                    <table class="table table-bordered">
                        <tr>
                            <th style="width:200px;color:red;text-align:center">Tiêu Đề</th>
                            <th style="color:green;text-align:center">Nội Dung</th>
                        </tr>
                        <td>Hình ảnh</td>
                            <td class=" align-middle">
                                <img style="width:80px" class="img-fluid" src="{{ asset('images/slider/' . $slider->image) }}"
                                    alt="{{ $slider->image }}">
                            </td>
                        <tr>
                            <td class=" align-middle">Tên Slider</td>
                            <td class=" align-middle">{{ $slider->name }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Slug</td>
                            <td class=" align-middle">{{ $slider->slug }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Sắp xếp</td>
                            <td class=" align-middle">{{ $slider->sort_order }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Link</td>
                            <td class=" align-middle">{{ $slider->link }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Posistion</td>
                            <td class=" align-middle">{{ $slider->posistion }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle"> Người tạo   </td>
                            <td class=" align-middle">{{ $slider->created_by }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Người cập nhật</td>
                            <td class=" align-middle">{{ $slider->updated_by }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Ngày tạo</td>
                            <td class=" align-middle">{{ $slider->created_at }}</td>
                        </tr>
                        <tr>
                            <td class=" align-middle">Ngày cập nhật</td>
                            <td class=" align-middle">{{ $slider->updated_at }}</td>
                        </tr>
                    </table>
                </div>
               
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->
            

        </section>
        <!-- /.content -->
    </div>
@endsection

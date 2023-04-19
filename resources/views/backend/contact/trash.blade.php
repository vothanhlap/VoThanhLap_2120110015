@extends('layouts.admin')
@section('title', 'thùng rác liên hệ')
@section('header')
<link rel="stylesheet" href="{{ asset('public/jquery.dataTables.min.css') }}">
@endsection
@section('footer')
    <script src="{{ asset('public/jquery.dataTables.min.js') }}"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content my-3">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <strong class="text-danger text-uppercase">THÙNG RÁC liên hệ</strong>
                    </div>
                    <div class="col-md-6 text-right">       
                                <a href="{{ route('contact.index') }}"class="btn btn-sm btn-success">
                                    <i class="fas fa-long-arrow-alt-left"></i> Quay về danh sách
                                </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @includeIf('backend.message_alert')
                    <table class="table table-bordered table-striped" id="myTable">
                        <thead>
                            <tr>
                                <th style="width:30px" class="text-center">#</th>
                                <th style="width:100px" class="text-center">Tên liên hệ</th>
                                <th style="width:100px" class="text-center">Số điện thoại</th>
                                <th style="width:100px" class="text-center">Email</th>
                                <th style="width:100px" class="text-center">Người phản hồi</th>
                                <th style="width:150px" class="text-center">Chức năng</th>
                                <th style="width:30px" class="text-center">ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_contact as $contact)
                                <tr>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                   
                                    <td class="text-center align-middle">{{ $contact->name }}</td>
                                <td class="text-center align-middle">{{ $contact->phone }}</td>
                                <td class="text-center align-middle">{{ $contact->email}}</td>
                                <td class="text-center align-middle">{{ $contact->replay_id }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('contact.restore', ['contact' => $contact->id]) }}"
                                            class="btn btn-sm btn-success"><i class="fas fa-undo"></i></a>
                                        <a href="{{ route('contact.destroy', ['contact' => $contact->id]) }}"
                                            class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> </a>
                                    </td>
                                    <td>{{ $contact->id }}</td>
                                </tr>
                            @endforeach
    
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- /.card-body -->

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
@endsection


     {{-- <!-- Content Header (Page header) -->
     <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>liên hệ</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
                        <li class="breadcrumb-item active">Tất cả liên hệ</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-sm btn-danger" type="submit">
                            <i class="far fa-file-times"></i>Xóa</button>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('contact.index') }}"class="btn btn-sm btn-success">
                            <i class="fas fa-long-arrow-alt-left"></i> Quay về danh sách
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                @includeIf('backend.message_alert')
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width:30px" class="text-center">#</th>
                            <th style="width:90px" class="text-center">Hình đại diện</th>
                            <th>Tên danh mục</th>
                            <th>slug</th>
                            <th>Ngày đăng</th>
                            <th style="width:280px" class="text-center">Chức năng</th>
                            <th style="width:30px" class="text-center">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_contact as $contact)
                            <tr>
                                <td>
                                    <input type="checkbox">
                                </td>
                                <td>
                                    <img class="img-fluid" src="{{ asset('images/contact/' . $contact->image) }}"
                                        alt="{{ $contact->image }}">
                                </td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->slug }}</td>
                                <td class="text-center">{{ $contact->created_at }}</td>
                                <td class="text-center">
                                    <a href="{{ route('contact.restore', ['contact' => $contact->id]) }}"
                                        class="btn btn-sm btn-success"><i class="fas fa-undo"></i></a>
                                    <a href="{{ route('contact.destroy', ['contact' => $contact->id]) }}"
                                        class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> </a>
                                </td>
                                <td>{{ $contact->id }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content --> --}}
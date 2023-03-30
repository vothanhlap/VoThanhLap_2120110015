@extends('layouts.admin')
@section('title', 'Tất cả danh mục sản phẩm')
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
   <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content my-3">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <strong class="text-danger text-uppercase">DANH MỤC SẢN PHẨM</strong>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('contact.create') }}"class="btn btn-sm btn-success">
                            <i class="fas fa-plus"></i> Thêm
                        </a>
                        <a href="{{ route('contact.trash') }}"class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Thùng rác
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
                            <th style="width:90px" class="text-center">Hình đại diện</th>
                            <th style="width:100px" class="text-center">Tên liên hệ</th>
                            <th style="width:100px" class="text-center">Người phản hồi</th>
                            <th style="width:150px" class="text-center">Chức năng</th>
                            <th style="width:30px" class="text-center">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_contact as $contact)
                            <tr>
                                <td  class="text-center align-middle">
                                    <input type="checkbox">
                                </td>
                                <td class="text-center align-middle">
                                    <img style="width:80px" class="img-fluid" src="{{ asset('images/contact/' . $contact->image) }}"
                                        alt="{{ $contact->image }}">
                                </td>
                                <td class="text-center align-middle">{{ $contact->name }}</td>
                                <td class="text-center align-middle">{{ $contact->replay_id }}</td>
                                <td class="text-center align-middle">
                                    @if ($contact->status == 1)
                                        <a href="{{ route('contact.status', ['contact' => $contact->id]) }}"
                                            class="btn btn-sm btn-success"><i class="fas fa-toggle-on"></i> </a>
                                    @else
                                        <a href="{{ route('contact.status', ['contact' => $contact->id]) }}"
                                            class="btn btn-sm btn-danger"><i class="fas fa-toggle-off"></i> </a>
                                    @endif

                                    <a href="{{ route('contact.edit', ['contact' => $contact->id]) }}"
                                        class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('contact.show', ['contact' => $contact->id]) }}"
                                        class="btn btn-sm btn-success"><i class="far fa-eye"></i></a>
                                    <a href="{{ route('contact.delete', ['contact' => $contact->id]) }}"
                                        class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                                <td class="text-center align-middle">{{ $contact->id }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@extends('layouts.admin')
@section('title', 'Tất cả liên hệ')
@section('header')
<link rel="stylesheet" href="{{ asset('public/jquery.dataTables.min.css') }}">
@endsection
@section('footer')
    <script src="{{ asset('public/jquery.dataTables.min.js') }}"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
@endsection
@extends('backend.dashboard.menuadmin')
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
                        <strong class="text-danger text-uppercase">liên hệ</strong>
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
                                <td  class="text-center align-middle">
                                    <input type="checkbox">
                                </td>
                                <td class="text-center align-middle">{{ $contact->name }}</td>
                                <td class="text-center align-middle">{{ $contact->phone }}</td>
                                <td class="text-center align-middle">{{ $contact->email}}</td>
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
                                        class="btn btn-sm btn-info"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                          </svg></a>
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

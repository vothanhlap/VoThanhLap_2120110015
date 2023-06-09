@extends('layouts.admin')
@section('title', 'thùng rác user')
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
                        <strong class="text-danger text-uppercase">Thùng rác USER</strong>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="{{ route('user.index') }}"class="btn btn-sm btn-success">
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
                            <th style="width:10px" class="text-center">#</th>
                            {{-- <th style="width:90px" class="text-center">Hình đại diện</th> --}}
                            <th style="width:120px"  class="text-center">Họ tên</th>
                            <th  class="text-center">Username</th>
                            <th  class="text-center">Số điện thoại</th>
                            <th  class="text-center">Email</th>
                            <th style="width:80px"  class="text-center">Chức vụ</th>
                            <th style="width:180px" class="text-center">Chức năng</th>
                            <th style="width:10px" class="text-center">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_user as $user)
                            <tr>
                                <td  class="text-center align-middle">
                                    <input type="checkbox">
                                </td>
                                {{-- <td class="text-center align-middle">
                                    <img style="width:80px" class="img-fluid" src="{{ asset('images/user/' . $user->image) }}"
                                        alt="{{ $user->image }}">
                                </td> --}}
                                <td class=" align-middle">{{ $user->name }}</td>
                                <td class=" align-middle">{{ $user->username}}</td>
                                <td class="align-middle">{{ $user->phone}}</td>
                                <td class=" align-middle">{{ $user->email}}</td>
                                <td class="text-center align-middle">
                                    @if (($user->roles)==1)
                                        <p>admin</p>
                                    @else
                                        <p>Khách hàng</p>
                                    @endif
                                </td>
                                <td class="text-center align-middle">
                                    <a href="{{ route('user.restore', ['user' => $user->id]) }}"
                                        class="btn btn-sm btn-success"><i class="fas fa-undo"></i></a>
                                    <a href="{{ route('user.destroy', ['user' => $user->id]) }}"
                                        class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> </a>
                                </td>
                                <td class="text-center align-middle">{{ $user->id }}</td>
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

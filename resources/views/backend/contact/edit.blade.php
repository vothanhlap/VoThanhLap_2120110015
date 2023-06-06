@extends('layouts.admin')
@section('title', 'Trả lời liên hệ')
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
                                        <strong class="text-danger text-uppercase">Trả lời liên hệ</strong>                
                                </div>
                                <div class="col-md-6 text-right">
                                   
                                    <a href="{{ route('contact.index') }}"class="btn btn-sm btn-info">
                                          <i class="fas fa-long-arrow-alt-left"></i> Quay lại danh sách
                                    </a>
                                </div>
                            </div>
                        </div>
    
                        <div class="card-body">
                            @includeIf('backend.message_alert')
                            <h3 style="color:#f016f0">THÔNG TIN KHÁCH HÀNG</h3>
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <td>Tên khách hàng</td>
                                    <td>{{ $contact->name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>{{ $contact->email }}</td>
                                </tr>
                                <tr>
                                    <td>Số điện thoại</td>
                                    <td>{{ $contact->phone }}</td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                    <td>{{ $contact->address }}</td>
                                </tr>
                            </table>
                            <h3 class="py-3" style="color:#f016f0">THÔNG TIN TRẢ LỜI KHÁCH HÀNG</h3>
                             <p>Nội dụng trả lời của khách hàng</p>
                            <textarea readonly name="" id="" cols="140" rows="5"></textarea>    
                            <p>Võ Thành Lập</p>
                           <input type="text" class="form-control" value="{{ old('note_cus', $contact->note_cus) }}">
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

@extends('layouts.admin')
@section('title', 'Quản lý shop')
@extends('backend.dashboard.menuadmin')
@section('content')
@section('header')
<link rel="stylesheet" href="{{ asset('public/jquery.dataTables.min.css') }}">
@endsection
@section('footer')
    <script src="{{ asset('public/jquery.dataTables.min.js') }}"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
@endsection
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
        @includeIf('backend.message')
          <div class="row mb-2">
              <div class="col-sm-6">
                  <h1 class="m-0 text-danger">BẢNG ĐIỀU KHIỂN</h1>
              </div><!-- /.col -->
             
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-info">
                      <div class="inner">
                          <h3>{{$product_count}}</h3>

                          <p>Số lượng kho</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-bag"></i>
                      </div>
                      <a href="{{route('product.index')}}" class="small-box-footer">Xem thêm<i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-success">
                      <div class="inner">
                          <h3>{{$post_count}}</h3>
                          <p>Bài viết</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-mail-bulk"></i>
                      </div>
                      <a href="{{route('post.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-warning">
                      <div class="inner">
                          <h3>{{$custumer_count}}</h3>
                          <p>Thành viên</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-person-add"></i>
                      </div>
                      <a href="{{route('user.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-danger">
                      <div class="inner">
                          <h3>{{number_format($order_count,0)}}đ</h3>
                          <p>Danh thu</p>
                      </div>
                      <div class="icon">
                          <i class="ion ion-pie-graph"></i>
                      </div>
                      <a href="{{route('order.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
              </div>
              <!-- ./col -->
          </div>
          <!-- /.row -->      
      </div><!-- /.container-fluid -->
      {{-- <h4 class="text-center mt-4">Danh sách đơn hàng</h4>
     <div class="container">
        <table class="table table-bordered table-striped" id="myTable">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">MSP</th>
                    <th class="text-center">Ngày đặt</th>
                    <th class="text-center">Tên sản phẩm</th>
                    <th class="text-center">SL</th>
                    <th class="text-center">Đơn giá</th>
                    <th class="text-center">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list_order as $item)
                <tr>
                    <td class="text-center">
                        <input type="checkbox" name="checkbox" id="checkbox">
                    </td>
                    <td>MSP10032002{{$item->id}}</td>
                    <td>{{$item->created_at}}</td>
                    <td></td>
                    <td>{{$item->number}}</td>
                    <td>{{number_format(($item->price),0)}} VND</td>
                    <td>{{number_format(($item->price)*($item->number),0)}} VND</td>
                </tr>
                @endforeach
            </tbody>
          </table>
     </div> --}}
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
  @endsection
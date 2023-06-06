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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        var xValues = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5","Tháng 6"];
        var yValues = [458.000, 150.000, 750.000, 800.000, 950.000];
        var barColors = ["red", "green","blue","orange","brown"];
        
        new Chart("myChart", {
          type: "bar",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: barColors,
              data: yValues
            }]
          },
          options: {
            legend: {display: false},
            title: {
              display: true,
              text: "Thống kê doanh thu 6 tháng đầu năm 2023"
            }
          }
        });
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
                            <h3>{{ $product_count }}</h3>
                            <p>Số lượng kho</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{ route('product.index') }}" class="small-box-footer">Xem thêm<i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $post_count }}</h3>
                            <p>Bài viết</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-mail-bulk"></i>
                        </div>
                        <a href="{{ route('post.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $custumer_count }}</h3>
                            <p>Thành viên</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ route('user.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ number_format($order_count, 0) }}đ</h3>
                            <p>Danh thu</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="{{ route('order.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                       <div class="row">
                        <div class="col-md-4">
                            <input class="mx-2 form-control " type="date">
                            
                        </div>
                        <div class="col-md-4">
                            <input class="mx-2 form-control" type="date">
                        </div>
                       </div>
                    </div>
                    <div class="col-md-4">
                       <button type="button" class="btn btn-info">Tìm</button>
                    </div>
                </div>
            </div>
            <canvas id="myChart" style="width:100%;max-width:800px"></canvas>            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    
</div>
<!-- /.content-wrapper -->
@endsection

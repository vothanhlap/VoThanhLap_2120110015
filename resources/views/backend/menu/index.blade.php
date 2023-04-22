@extends('layouts.admin')
@section('title', 'Tất cả menu')
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
    <form name="form" action="{{ route('menu.store') }}" method="post">
        @csrf
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content my-3">
    
                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <strong class="text-danger text-uppercase">DANH SÁCH MENU</strong>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('menu.trash') }}"class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> Thùng rác
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @includeIf('backend.message_alert')
                        <div class="row">
                            <div class="col-3 float-start">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="position">
                                            <select name="position" class="form-control">
                                                <option value="mainmenu">Mainmenu</option>
                                                <option value="footermenu">Footermenu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingcategory">
                                            <span>Loại sản phẩm</span>
                                            <span class="float-right btn btn-sm btn-info" data-toggle="collapse"
                                                data-target="#collapsecategory" aria-expanded="true"
                                                aria-controls="collapsecategory">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </div>
                                        <div id="collapsecategory" class="collapse p-2 m-2" aria-labelledby="headingcategory"
                                            data-parent="#accordionExample">
                                            @foreach ($list_category as $category)
                                            <fieldset class="form-group">
                                                <input name="checkIdCategory[]" value="{{$category->id}}" id="checkCategory{{$category->id}}" type="checkbox">
                                                <label for="checkCategory{{$category->id}}"> {{$category->name}}</label>
                                            </fieldset>
                                            @endforeach
                                            <fieldset class="form-group">
                                                <input type="submit" name="ThemCategory" value="Thêm"
                                                    class="btn btn-success form-control">
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingBrand">
                                            <span>Thương hiệu</span>
                                            <span class="float-right btn btn-sm btn-info" data-toggle="collapse"
                                                data-target="#collapseBrand" aria-expanded="true" aria-controls="collapsePage">
                                                <i class="fas fa-plus"></i>
                                            </span>
    
                                        </div>
    
                                        <div id="collapseBrand" class="collapse p-2 m-2" aria-labelledby="headingBrand"
                                            data-parent="#accordionExample">
                                            @foreach ($list_brand as $brand)
                                            <fieldset class="form-group">
                                                <input name="checkIdBrand[]" value="{{$brand->id}}" id="checkBrand{{$brand->id}}" type="checkbox">
                                                <label for="checkBrand{{$brand->id}}">{{$brand->name}}</label>
                                            </fieldset> 
                                            @endforeach
                                            <fieldset class="form-group">
                                                <input type="submit" name="ThemBrand" value="Thêm"
                                                    class="btn btn-success form-control">
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingTopic">
                                            <span>Chủ đề bài viết</span>
                                            <span class="float-right btn btn-sm btn-info" data-toggle="collapse"
                                                data-target="#collapseTopic" aria-expanded="true" aria-controls="collapseTopic">
                                                <i class="fas fa-plus"></i>
                                            </span>
    
                                        </div>
    
                                        <div id="collapseTopic" class="collapse p-2 m-2" aria-labelledby="headingTopic"
                                            data-parent="#accordionExample">
                                            @foreach ($list_topic as $topic)
                                            <fieldset class="form-group">
                                                <input name="checkIdTopic[]" value="{{$topic->id}}" id="checkTopic{{$topic->id}}" type="checkbox">
                                                <label for="checkTopic{{$topic->id}}">{{$topic->title}}</label>
                                            </fieldset> 
                                            @endforeach
                                            <fieldset class="form-group">
                                                <input type="submit" name="ThemTopic" value="Thêm"
                                                    class="btn btn-success form-control">
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingPage">
                                            <span>Trang đơn</span>
                                            <span class="float-right btn btn-sm btn-info" data-toggle="collapse"
                                                data-target="#collapsePage" aria-expanded="true"
                                                aria-controls="collapsePage">
                                                <i class="fas fa-plus"></i>
                                            </span>
    
                                        </div>
    
                                        <div id="collapsePage" class="collapse p-2 m-2" aria-labelledby="headingPage"
                                            data-parent="#accordionExample">
                                            @foreach ($list_page as $page)
                                            <fieldset class="form-group">
                                                <input name="checkIdPage[]" value="{{$page->id}}" id="checkPage{{$page->id}}" type="checkbox">
                                                <label for="checkPage{{$page->id}}">{{$page->title}}</label>
                                            </fieldset> 
                                            @endforeach
                                            <fieldset class="form-group">
                                                <input type="submit" name="ThemPage" value="Thêm"
                                                    class="btn btn-success form-control">
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingCustom">
                                            <span>Tùy chỉnh</span>
                                            <span class="float-right btn btn-sm btn-info" data-toggle="collapse"
                                                data-target="#collapseCustom" aria-expanded="true"
                                                aria-controls="collapseCustom">
                                                <i class="fas fa-plus"></i>
                                            </span>
                                        </div>
                                        <div id="collapseCustom" class="collapse p-2 m-2" aria-labelledby="headingCustom"
                                            data-parent="#accordionExample">
                                            <fieldset class="form-group">
                                                <label>Tên menu</label>
                                                <input name="name" class="form-control" id="checkid" type="text">
                                            </fieldset>
                                            <fieldset class="form-group">
                                                <label>Liên kết</label>
                                                <input name="link" class="form-control" type="text">
                                            </fieldset>
                                            <fieldset class="form-group">
                                                <input type="submit" name="ThemCustom" value="Thêm"
                                                    class="btn btn-success form-control">
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-9 float-right ">
                                <table class="table table-bordered table-striped" id="myTable">
                                    <thead>
                                        <tr>
                                          <th class="text-center" style="width:20px">#</th>
                                          <th style="width:120px">Tên Menu</th>
                                          <th>Lien ket</th>
                                          <th style="width:80px" class="text-center">Vị trí</th>
                                          <th style="width:160px" class="text-center">Chức năng</th>
                                          <th class="text-center" style="width:10px">ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list_menu as $menu)
                                        <tr>
                                            <td  class="text-center align-middle">
                                                <input type="checkbox">
                                            </td>
                                            <td>{{$menu->name}}</td>
                                            <td>{{$menu->link}}</td>
                                            <td class="text-center">{{$menu->position}}</td>
                                            <td class="text-center">
                                                @if ($menu->status == 1)
                                                <a href="{{ route('menu.status', ['menu' => $menu->id]) }}"
                                                    class="btn btn-sm btn-success"><i class="fas fa-toggle-on"></i> </a>
                                            @else
                                                <a href="{{ route('menu.status', ['menu' => $menu->id]) }}"
                                                    class="btn btn-sm btn-danger"><i class="fas fa-toggle-off"></i> </a>
                                            @endif
        
                                            <a href="{{ route('menu.edit', ['menu' => $menu->id]) }}"
                                                class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('menu.show', ['menu' => $menu->id]) }}"
                                                class="btn btn-sm btn-success"><i class="far fa-eye"></i></a>
                                            <a href="{{ route('menu.delete', ['menu' => $menu->id]) }}"
                                                class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                            <td>{{$menu->id}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
    
        </div>
        <!-- /.card -->
    </form>
   

    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

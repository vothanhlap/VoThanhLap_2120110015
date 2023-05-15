@extends('layouts.site')
@section('title', $row_brand->name)
@section('content')
    <!-- =============== SECTION ITEMS =============== -->
<section  class="padding-bottom-sm">
 <div class="container">
    <div class="col-md-12">
        <div class="card mb-3 mt-2">
            <div class="card-body">
                <ol class="breadcrumb float-left">
                    <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">HOME</a></li>
                    <li class="breadcrumb-item"><a href="#">{{$row_brand->name}}</a></li>     
                </ol>
            </div> <!-- card-body .// -->
        </div> <!-- card.// -->
        <div class="row">
            <div class="col-md-3">
                
                    <article class="filter-group">
                        <h6 class="title">
                            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#collapse_1">Danh mục sản phẩm</a>
                        </h6>
                        <div class="filter-content collapse show" id="collapse_1" style="">
                            <div class="inner">
                                <ul class="list-menu">
                                    @foreach ($list_category as $item)
                                    <li><a href="{{route('frontend.slug',['slug'=>$item->slug])}}">{{$item->name}}</a></li>
                                    @endforeach  
                                </ul>
                            </div> <!-- inner.// -->
                        </div>
                    </article> <!-- filter-group  .// -->
                    
                    <article class="filter-group">
                        <h6 class="title">
                            <a href="#" class="dropdown-toggle" data-toggle="collapse" data-target="#collapse_1">Thương hệu </a>
                        </h6>
                        <div class="filter-content collapse show" id="collapse_1" style="">
                            <div class="inner">
                                <ul class="list-menu">
                                   @foreach ($list_brand as $item)
                                   <li><a href="{{route('frontend.slug',['slug'=>$item->slug])}}">{{$item->name}}</a></li>
                                   @endforeach               
                                </ul>
                            </div> <!-- inner.// -->
                        </div>
                    </article> <!-- filter-group  .// -->
    
                    
            </div>
            <div class="col-md-9">
            
                <div class="row row-sm">
                  @foreach ($list_product as $item)
                    @php
                    $arr_image=$item->productimg;
                    $image = 'hinh.png';
                    if(count($arr_image)>0)
                    {
                    $image=$arr_image[0]['image'];
                    }
                    @endphp
                  <div class=" col-md-3 " >
                    <div class="card card-sm card-product-grid " >
                        <a  href="{{route('frontend.slug',['slug'=>$item->slug])}}"> <img style="height: 150px;" class="img-fluid"  src="{{ asset('images/product/'.$image)}}"> </a>
                        <figcaption class="info-wrap" style="height: 100px; width:200px">
                            <a href="{{route('frontend.slug',['slug'=>$item->slug])}}" class="title text-truncate">{{$item->name}}</a>
                            <div class="price mt-1">
                                {{ number_format($item->price_buy,0) }} VNĐ
                            </div> <!-- price-wrap.// -->
                              
                            <a onclick="AddCart({{$item->id}})" href="javaCrip:"><button type="submit" class=" btn btn-sm border border-warning ">Thêm vào giỏ hàng</button></a>
 
                        </figcaption>
                        
                    </div>
                    
                </div> <!-- col.// -->
                  @endforeach
                </div> <!-- row.// -->
            </div>
        </div>
    </div>
   
    <div class="col-12"> 
        {{$list_product->links()}}
 </div>
 </div>
</section>
    <!-- =============== SECTION ITEMS .//END =============== -->
    
@endsection
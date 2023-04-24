@extends('layouts.site')
@section('title', $row_brand->name)
@section('content')
    <!-- =============== SECTION ITEMS =============== -->
<section  class="padding-bottom-sm">
 <div class="container">
    
    <header class="section-heading heading-line">
        <h4 class="title-section text-uppercase">{{$row_brand->name}}</h4>
    </header>
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
      <div class="col-xl-2 col-lg-3 col-md-4 col-8" >
        <div class="card card-sm card-product-grid " >
            <a  href="{{route('frontend.slug',['slug'=>$item->slug])}}"> <img style="height: 150px;" class="img-fluid"  src="{{ asset('images/product/'.$image)}}"> </a>
            <figcaption class="info-wrap" style="height: 100px; width:200px">
                <a href="#" class="title text-truncate">{{$item->name}}</a>
                <div class="price mt-1">
                    {{ number_format($item->price_buy,0) }} VNĐ
                </div> <!-- price-wrap.// -->
                   {{-- <div class="overlays"></div> --}}
                   <div class="servece-desc">
                    <div class="row mx-2">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-sm btn-info">
                                <a href="{{route('frontend.slug',['slug'=>$item->slug])}}"><i class="far fa-eye"></i></a>
                            </button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-sm btn-info">
                                <a onclick="AddCart({{$item->id}})" href="javaCrip:"><i class="fa fa-shopping-cart"></i></a>
                            </button>
                        </div>
                    </div>
                </div>
            </figcaption>
            
        </div>
        
    </div> <!-- col.// -->
      @endforeach
    </div> <!-- row.// -->
    <div class="col-12"> 
        {{$list_product->links()}}
 </div>
 </div>
</section>
    <!-- =============== SECTION ITEMS .//END =============== -->
    
@endsection
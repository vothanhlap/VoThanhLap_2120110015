@extends('layouts.site')
@section('title', 'Kết quả tìm kiếm')
@section('content')
<section class="padding-bottom-sm">
    <div class="container">
        <header class="section-heading heading-line">
            <h4 class="title-section text-uppercase">Kết quả tìm kiếm</h4>
        </header>
        <h5 class="text-danger">Đã tìm thấy {{count($listsp)}} sản phẩm</h5>
        <div class="row row-sm">
            @foreach ($listsp as $item)
            @php
            $arr_image = $item->productimg;
            $image = 'hinh.png';
            if (count($arr_image) > 0) {
            $image = $arr_image[0]['image'];
            }
            @endphp
            <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                <div class="card card-sm card-product-grid" style="height: 250px">
                    <a href="{{route('frontend.slug',['slug'=>$item->slug])}}" class="img-wrap"><img
                            src="{{ asset('images/product/' . $image) }}"></a>
                    <figcaption class="info-wrap">
                        <a href="{{route('frontend.slug',['slug'=>$item->slug])}}"
                            class="title text-center text-truncate">{{ $item->name }}</a>
                        <div class="price mt-1 text-center">
                            {{ number_format($item->price_buy,0) }} VNĐ
                        </div> <!-- price-wrap.// -->
                    </figcaption>
                </div>
            </div> <!-- col.// -->
            @endforeach
        </div> <!-- row.// -->

    </div>
</section>

@endsection
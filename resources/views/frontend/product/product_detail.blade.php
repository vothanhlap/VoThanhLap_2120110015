@extends('layouts.site')
@section('title', 'Chi tiet san pham')
@section('content')
    @php
        $arr_image = $product->productimg;
        $image = 'hinh.png';
        if (count($arr_image) > 0) {
            $image = $arr_image[0]['image'];
        }
    @endphp
     
    <!-- ============================ ITEM DETAIL ======================== -->
    <div class="row">
        <aside class="col-md-6">
            <div class="card">
                <article class="gallery-wrap">
                    <div class="img-big-wrap">
                        <div> <a href="#"><img src="{{ asset('images/product/' . $image) }}"></div>
                    </div> <!-- slider-product.// -->
                    <div class="thumbs-wrap">
                        @for ($i = 0; $i < count($arr_image) - 1; $i++)
                            <a href="#" class="item-thumb"> <img src="{{ asset('images/product/' . $image) }}"></a>
                        @endfor
                    </div> <!-- slider-nav.// -->
                </article> <!-- gallery-wrap .end// -->
            </div> <!-- card.// -->
        </aside>
        <main class="col-md-6">
            <article class="product-info-aside">

                <h2 class="title mt-3">{{ $product->name }}</h2>

                <div class="rating-wrap my-3">
                    <small class="label-rating text-muted">132 reviews</small>
                    <small class="label-rating text-success"> <i class="fa fa-clipboard-check"></i> 154 orders </small>
                </div> <!-- rating-wrap.// -->

                <div class="mb-3">
                    <var class="price h4"> {{ number_format($product->price_buy, 0) }} VNĐ</var>
                </div> <!-- price-detail-wrap .// -->

                <p>{{ $product->detail }} </p>
                @php
                    $soluong = $product->soluong;
                    $number = 0;
                    $number = $soluong->qty;
                @endphp



                <dl class="row">
                    <dt class="col-sm-3">Thương hiệu</dt>
                    <dd class="col-sm-9"><a href="#"></a>{{ $product->braname }}</dd>

                    <dt class="col-sm-3">Đã bán</dt>
                    <dd class="col-sm-9">{{ $number }}</dd>

                    <dt class="col-sm-3">Thời gian bảo hành </dt>
                    <dd class="col-sm-9">2 year</dd>

                    <dt class="col-sm-3">Thời gian giao hàng</dt>
                    <dd class="col-sm-9">3-4 ngay</dd>

                    <dt class="col-sm-3">Trạng thái</dt>
                    <dd class="col-sm-9">
                        @if ($product->status == 1 && 2)
                            Còn hàng
                        @else
                            Ngừng kinh doanh
                        @endif
                    </dd>
                </dl>
                <div class="form-row  mt-4">
                    <div class="form-group col-md flex-grow-0">
                        <div class="input-group">
                            <input type="number" style="width:80px" class="form-control text-center" value="1">
                        </div>
                        {{-- {{ route('giohang.addcart', ['id' => $product->id]) }} --}}
                    </div> <!-- col.// -->
                    <div class="form-group col-md">
                        <li  onclick="addcart({{$product->id}})" href="Javacrip:" class="btn  btn-primary">
                            <i class="fas fa-shopping-cart"></i> <span class="text">Thêm vào giỏ hàng</span>
                        </li>
                        <a href="#" class="btn btn-light">
                            <i class="fas fa-envelope"></i> <span class="text">Liên hệ nhà cung cấp</span>
                        </a>
                        {{-- //
                       // {{ route('category.edit', ['category' => $category->id]) }} --}}
                    </div> <!-- col.// -->
                </div> <!-- row.// -->

            </article> <!-- product-info-aside .// -->
        </main> <!-- col.// -->
    </div> <!-- row.// -->

    <!-- ================ ITEM DETAIL END .// ================= -->
    </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

    <!-- ========================= SECTION  ========================= -->
    <section class="section-name padding-y bg">
        <div class="container">

            <div class="row">
                <div class="col-md-8">
                    <h5 class="title-description">mô tả chi tiết sản phẩm</h5>
                    <ul class="list-check">
                        <li> {{$product->detail}}</li> 
                    </ul>
                    

                    <h5 class="title-description ">Mô tả sản phẩm</h5>
                    <ul class="list-check">
                        <li> {{$product->metakey}} </li>
                    </ul>
                       
                    </div> <!-- col.// -->
                    <aside class="col-md-4">
                        <div class="box">
                            <h5 class="title-description">Sản phẩm cùng loại</h5>
                            <hr>
                            
                            @foreach ($list_pro as $item)
                          
                             @php
                             $arr_image=$item->productimg;
                             $image = 'hinh.png';
                             if(count($arr_image)>0)
                             {
                             $image=$arr_image[0]['image'];
                             }
                             @endphp
                            <article class="media mb-3">
                                <a href="#"><img class="img-sm mr-3" src="{{ asset('images/product/' . $image) }}"></a>
                                <div class="media-body">
                                    <h6 class="mt-0"><a href="{{route('frontend.slug',['slug'=>$item->slug])}}">{{$item->name}}</a></h6>
                                    <p class="mb-2"><span>Thương hiệu: </span>{{$product->braname}} </p>
                                    <p class="mb-2"><span>Gía: </span>{{ number_format($product->price_buy, 0) }} </p>
                                </div>
                            </article>
                        
                            @endforeach
                            
                        </div> <!-- box.// -->
                        
                    </aside> <!-- col.// -->

                
            </div> <!-- row.// -->
        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->

@endsection
<script>
    function myFunction(x) {
        x.classList.toggle("fa-thumbs-down");
    }
</script>


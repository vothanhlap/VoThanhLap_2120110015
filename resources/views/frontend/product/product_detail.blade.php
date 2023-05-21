@extends('layouts.site')
@section('title', $product->name)
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
        <aside class="col-md-7">
            <div class="card">
                <div class="product">
                    <div class="product-img">
                        @if (count($arr_image) > 1)
                            @for ($i = 0; $i < count($arr_image) - 1; $i++)
                                @php $image=$arr_image[$i]['image']; @endphp <img class="" src="{{ asset('images/product/' . $image) }}"
                                    onclick="myFunction(this)">
                            @endfor
                        @endif
                    </div>
                    <div class="img-container">
                        <img class="img-fluid" src="{{ asset('images/product/' . $image) }}" id="imgBox">
                    </div>
                </div>
            </div> <!-- card.// -->
        </aside>
        <main class="col-md-5">
            <article class="product-info-aside">
                <h2 class="title mt-3">{{ $product->name }}</h2>
                <div class="rating-wrap my-3">
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v16.0"
                        nonce="JqXKJbi5"></script>
                    <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width=""
                        data-layout="" data-action="" data-size="" data-share="true"></div>
                </div> <!-- rating-wrap.// -->

                <div class="mb-3">
                    <var class="price h4"> {{ number_format($product->price_buy, 0) }} VNĐ</var>
                </div> <!-- price-detail-wrap .// -->


                <div class="mt-4">
                    <table class="table table-bordered table-striped">

                        <tr>
                            <td>Thương hiệu</td>
                            <td>{{ $product->braname }}</td>
                        </tr>
                        <tr>
                            <td>Đã bán</td>
                            <td>{{ $product->number }}</td>
                        </tr>
                        <tr>
                            <td>Thời gian bảo hành </td>
                            <td>2-3 năm</td>
                        </tr>
                        <tr>
                            <td>Thời gian giao hàng </td>
                            <td>3-7 ngày </td>
                        </tr>
                        <tr>
                            <td>Trạng thái </td>
                            <td>
                                @if ($product->number > 0)
                                    Còn hàng
                                @else
                                    Hết hàng
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>


                <div class="form-row  mt-4">
                    <div class="form-group col-md">
                        <li class="btn btn-light">
                            <i class="fas fa-shopping-cart"></i>
                            <a onclick="AddCart({{ $product->id }})" href="javaCrip:"><span class="text">Thêm vào giỏ hàng</span></a>
                        </li>
                        <a href="#" class="btn btn-light">
                            <i class="fas fa-envelope"></i> <span class="text">Liên hệ nhà cung cấp</span>
                        </a>
                    </div> <!-- col.// -->
                </div> <!-- row.// -->

            </article> <!-- product-info-aside .// -->
        </main> <!-- col.// -->
    </div> <!-- row.// -->
    </div> <!-- container .//  -->
    </section>

    <section class="section-name padding-y mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-body">
                        @includeIf('backend.message_alert')
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="productinfo-tab" data-toggle="tab"
                                    data-target="#productinfo" type="button" role="tab" aria-controls="productinfo"
                                    aria-selected="true">Mô tả</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="productimage-tab" data-toggle="tab" data-target="#productimage"
                                    type="button" role="tab" aria-controls="productimage" aria-selected="false">Đặt
                                    tính</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="productattribute-tab" data-toggle="tab"
                                    data-target="#productattribute" type="button" role="tab"
                                    aria-controls="productattribute" aria-selected="false">Đánh giá</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active border-right border-bottom border-left p-3"
                                id="productinfo" role="tabpanel" aria-labelledby="productinfo-tab">
                                @includeIf('frontend.product.tab_productdetail') </div>
                            <div class="tab-pane fade border-right border-bottom border-left p-3 " id="productimage"
                                role="tabpanel" aria-labelledby="productimage-tab">
                                @includeIf('frontend.product.tab_productmetadesc')
                            </div>
                            <div class="tab-pane fade border-right border-bottom border-left p-3" id="productattribute"
                                role="tabpanel" aria-labelledby="productattribute-tab">
                                @includeIf('frontend.product.tab_danhgia')
                            </div>
                        </div>
                    </div>
                </div>
                <aside class="col-md-4">
                    <div class="box">
                        <h5 class="title-description">Sản phẩm cùng loại</h5>
                        <hr>
                        @foreach ($list_pro as $item)
                            @php
                                $arr_image = $item->productimg;
                                $image = 'hinh.png';
                                if (count($arr_image) > 0) {
                                    $image = $arr_image[0]['image'];
                                }
                            @endphp
                            <article class="media mb-3">
                                <a href="#"><img class="img-sm mr-3"
                                        src="{{ asset('images/product/' . $image) }}"></a>
                                <div class="media-body">
                                    <h6 class="mt-0"><a
                                            href="{{ route('frontend.slug', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                                    </h6>
                                    {{-- <p class="mb-2"><span>Thương hiệu: </span>{{ $item->braname }} </p> --}}
                                    <p class="mb-2"><span>Gía: </span>{{ number_format($product->price_buy, 0) }} </p>
                                </div>
                            </article>
                            <hr>
                        @endforeach
                        <a class="align-items-center justify-content-end mb-2" href="">
                            Xem tất cả
                        </a>
                    </div> <!-- box.// -->

                </aside> <!-- col.// -->
            </div> <!-- row.// -->
        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->
@endsection
<script>
    function myFunction(smallimg) {
        var fullImg = document.getElementById('imgBox')
        fullImg.src = smallimg.src;
    }
</script>

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
                        @if (count($arr_image) > 1)
                            @for ($i = 0; $i < count($arr_image) - 1; $i++)
                                @php
                                    $image = $arr_image[$i]['image'];
                                @endphp
                                <a href="#" class="item-thumb"> <img src="{{ asset('images/product/' . $image) }}"></a>
                            @endfor
                        @endif
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
                <h6>Chọn cấu hình:</h6>
                <div class="container text-center">
                    <div class="row align-items-start">
                        @foreach ($list_value as $item)
                            <div class="col-md-4 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $item->id }}"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $item->value }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt-4">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width:80px;color:red;text-align:center"></th>
                            <th style="width:150px; color:green;text-align:center"></th>
                        </tr>
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
                    <div class="form-group col-md flex-grow-0">
                        <div class="input-group">
                            <input type="number" style="width:80px" class="form-control text-center" value="1">
                        </div>
                    </div> <!-- col.// -->
                    <div class="form-group col-md">
                        <a href="{{ route('giohang.addcart', ['id' => $product->id]) }}" class="btn  btn-primary">
                            <i class="fas fa-shopping-cart"></i> <span class="text">Thêm vào giỏ hàng</span>
                        </a>
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
    </div> <!-- container .//  -->
    </section>

    <section class="section-name padding-y bg">
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
                                @includeIf('frontend.product.tab_productmetakey')
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
                                    <p class="mb-2"><span>Thương hiệu: </span>{{ $product->braname }} </p>
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
    function myFunction(imgs) {
        // Get the expanded image
        var expandImg = document.getElementById("expandedImg");
        // Get the image text
        var imgText = document.getElementById("imgtext");
        // Use the same src in the expanded image as the image being clicked on from the grid
        expandImg.src = imgs.src;
        // Use the value of the alt attribute of the clickable image as text inside the expanded image
        imgText.innerHTML = imgs.alt;
        // Show the container element (hidden with CSS)
        expandImg.parentElement.style.display = "block";
    }
</script>
{{-- <script>
    function myFunction(x) {
        x.classList.toggle("fa-thumbs-down");
    }
</script> --}}

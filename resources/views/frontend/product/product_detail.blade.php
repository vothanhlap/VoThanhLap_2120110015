@extends('layouts.site')
@section('title', 'Chi tiet san pham')
@section('content')
@php
$arr_image=$product->productimg;
$image = 'hinh.png';
if(count($arr_image)>0)
{
$image=$arr_image[0]['image'];
}
@endphp
    <!-- ============================ ITEM DETAIL ======================== -->
    <div class="row">
        <aside class="col-md-6">
            <div class="card">
                <article class="gallery-wrap">
                    <div class="img-big-wrap">
                        <div> <a href="#"><img src="{{ asset('images/product/'.$image)}}"></div>
                    </div> <!-- slider-product.// -->
                    <div class="thumbs-wrap">
						@for ($i = 0; $i < count($arr_image)-1; $i++)
						<a href="#" class="item-thumb"> <img src="{{ asset('images/product/'.$image)}}"></a>  
						@endfor
                    </div> <!-- slider-nav.// -->
                </article> <!-- gallery-wrap .end// -->
            </div> <!-- card.// -->
        </aside>
        <main class="col-md-6">
            <article class="product-info-aside">

                <h2 class="title mt-3">{{$product->name}}</h2>

                <div class="rating-wrap my-3">
                    <ul class="rating-stars">
                        <li style="width:80%" class="stars-active">
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </li>
                        <li>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </li>
                    </ul>
                    <small class="label-rating text-muted">132 reviews</small>
                    <small class="label-rating text-success"> <i class="fa fa-clipboard-check"></i> 154 orders </small>
                </div> <!-- rating-wrap.// -->

                <div class="mb-3">
                    <var class="price h4"> {{ number_format($product->price_buy,0) }} VNĐ</var>
                </div> <!-- price-detail-wrap .// -->

                <p>{{$product->detail}} </p>
                @php
                $soluong = $product->soluong;
                $number= 0 ;
                $number = $soluong->qty; 
                @endphp



                <dl class="row">
                    <dt class="col-sm-3">Thương hiệu</dt>
                    <dd class="col-sm-9"><a href="#"></a>{{$product->braname}}</dd>

                    <dt class="col-sm-3">Đã bán</dt>
                    <dd class="col-sm-9">{{$number}}</dd>

                    <dt class="col-sm-3">Thời gian bảo hành </dt>
                    <dd class="col-sm-9">2 year</dd>

                    <dt class="col-sm-3">Thời gian giao hàng</dt>
                    <dd class="col-sm-9">3-4 days</dd>

                    <dt class="col-sm-3">Trạng thái</dt>
                    <dd class="col-sm-9">in Stock</dd>
                </dl>

                <div class="form-row  mt-4">
                    <div class="form-group col-md flex-grow-0">
                        <div class="input-group mb-3 input-spinner">
                            <div class="input-group-prepend">
                                <button class="btn btn-light" type="button" id="button-plus"> + </button>
                            </div>
                            <input type="text" class="form-control" value="1">
                            <div class="input-group-append">
                                <button class="btn btn-light" type="button" id="button-minus"> &minus; </button>
                            </div>
                        </div>
                    </div> <!-- col.// -->
                    <div class="form-group col-md">
                        <a href="#" class="btn  btn-primary">
                            <i class="fas fa-shopping-cart"></i> <span class="text">Thêm vào giỏ hàng</span>
                        </a>
                        <a href="#" class="btn btn-light">
                            <i class="fas fa-envelope"></i> <span class="text">Liên hệ nhà cung cấp</span>
                        </a>
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
                    <h5 class="title-description">Chi tiết sản phẩm</h5>
                    <p>
                        {{$product->metakey}}
                    </p>
                    <ul class="list-check">
                        <li></li>
                    </ul>

                    <h5 class="title-description">Thông số kỹ thuật</h5>
                    <table class="table table-bordered">
                        <tr>
                            <th colspan="2">Basic specs</th>
                        </tr>
                        <tr>
                            <td>Type of energy</td>
                            <td>Lava stone</td>
                        </tr>
                        <tr>
                            <td>Number of zones</td>
                            <td>2</td>
                        </tr>
                        <tr>
                            <td>Automatic connection </td>
                            <td> <i class="fa fa-check text-success"></i> Yes </td>
                        </tr>

                        <tr>
                            <th colspan="2">Dimensions</th>
                        </tr>
                        <tr>
                            <td>Width</td>
                            <td>500mm</td>
                        </tr>
                        <tr>
                            <td>Depth</td>
                            <td>400mm</td>
                        </tr>
                        <tr>
                            <td>Height </td>
                            <td>700mm</td>
                        </tr>

                        <tr>
                            <th colspan="2">Materials</th>
                        </tr>
                        <tr>
                            <td>Exterior</td>
                            <td>Stainless steel</td>
                        </tr>
                        <tr>
                            <td>Interior</td>
                            <td>Iron</td>
                        </tr>

                        <tr>
                            <th colspan="2">Connections</th>
                        </tr>
                        <tr>
                            <td>Heating Type</td>
                            <td>Gas</td>
                        </tr>
                        <tr>
                            <td>Connected load gas</td>
                            <td>15 Kw</td>
                        </tr>

                    </table>
                </div> <!-- col.// -->

                <aside class="col-md-4">

                    <div class="box">

                        <h5 class="title-description">Sản phẩm cùng loại</h5>
                          <hr>
                         {{-- @foreach ($list_product as $item)
                         @php
                         $arr_image=$item->productimg;
                         $image = 'hinh.png';
                         if(count($arr_image)>0)
                         {
                         $image=$arr_image[0]['image'];
                         }
                         @endphp --}}
                       <article class="media mb-3">
                           <a href="#"><img class="img-sm mr-3" src="images/posts/3.jpg"></a>
                           <div class="media-body">
                               <h6 class="mt-0"><a href="#">How to use this item</a></h6>
                               <p class="mb-2"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque
                                   ante sollicitudin </p>
                           </div>
                       </article>
                         {{-- @endforeach --}}
                    </div> <!-- box.// -->
                </aside> <!-- col.// -->
            </div> <!-- row.// -->

        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->
@endsection

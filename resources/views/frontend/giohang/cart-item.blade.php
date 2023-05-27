@if (Session::has("Cart")!= null)
<div class="modal-body">
    <table class="table table-bordered ">
        <tbody>
            @foreach (Session::get("Cart")->products as $item)
            @php
            $mo_ta = $item['productinfo']->name;
            $rut_gon1 = substr($mo_ta, 0, 100) . '...';

            $product_image= $item['image'];
            $hinh="";
            if(count($product_image)>0)
            {
            $hinh=$product_image[0]["image"];
            }
            @endphp

            <tr>
                <td>
                    <img style="width:80px" src="{{ asset('images/product/' . $hinh) }}" alt="{{$hinh}}">
                </td>
                <td>
                    <h3 class="product-name"><a href="#">{{ $rut_gon1 }}</a></h3>
                    <p class="product-price"><span class="qty">{{ $item['soluong'] }}
                            x</span>{{ number_format($item['productinfo']->price_buy) }} VNĐ</p>
                </td>
                <td class="close-btn align-middle" style="width:40px">
                    <i class="fa fa-close" data-id="{{ $item['productinfo']->id }}"></i>
                </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th class="align-middle text-danger">
                    <h6>
                        Tổng
                    </h6>
                </th>
                <th>
                    <h6>
                        {{ number_format(Session::get("Cart")->tonggia, 0) }} VNĐ
                    </h6>
                    <input hidden id="total-quanty-cart" type="number" class="form-control" value="{{ Session::get("
                        Cart")->tongsoluong }}">
                    {{-- <small>{{ Session::get("Cart")->tongsoluong }} sản phẩm</small> --}}
                </th>
            </tr>
        </tfoot>
    </table>
</div>
@else
<p class="text-center">Không có sản phẩm trong giỏ hàng</p>
@endif
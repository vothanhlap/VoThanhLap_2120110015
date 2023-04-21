@if (($newCart != null))
<div class="modal-body">
    <table>
        <tbody>
            @foreach ($newCart->products as $item)
            <tr>
                <td>
                  <img style="width:80px" src="public/images/product/laptop-hp-1.jpg" alt="">
                </td>
                <td>
                    <h3 class="product-name"><a href="#">{{$item['productinfo']->name}}</a></h3>
                    <p class="product-price"><span class="qty">{{$item['soluong']}} x</span>{{number_format($item['productinfo']->price_buy)}} VNĐ</p>
                </td>
                <td class="close-btn">            
                    <i class="fa fa-close" data-id="{{$item['productinfo']->id}}"></i>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
  
    <hr>
    <div class="col-md-6">
        <div class="cart-summary">
            <small>{{$newCart->tongsoluong}} sản phẩm</small>
            <h6>Tổng tiền: {{ number_format($newCart->tonggia, 0) }} VNĐ</h6>
        </div>
    </div>
</div> 

@endif

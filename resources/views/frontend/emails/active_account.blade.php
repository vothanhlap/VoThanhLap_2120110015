<div style="width:600px; margin: 0 auto;">
    <div style="text-align:center">
         <h1>Xin chào!{{$cus->fullname}}</h1>
         <p>Bạn đã đăng nhập tài khoan tại hệ thông của chúng tôi!</p>
         <p>Để sử dụng tại khoản ban vui lòng kích 
            vào link bên dưới để kích hoạt tài khoản của bạn</p>
         <button  href="{{route('actived.custumer',[$cus->id,'token'=>$cus->token])}}"></button>Nhấn vào đây
    </div>
</div>
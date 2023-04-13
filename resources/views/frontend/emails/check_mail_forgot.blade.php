<div style="width:600px; margin:0 auto;">
    <div style="text-align:center">
         <h1>Xin chào!{{$customer->name}}</h1>
         <p>Chúng tôi giửi đến bạn email này nhằm để khôi phục lại mật khẩu cho bạn!</p>
         <p>Vui long lấy lại link dưới đây dể lấy lại mật khẩu</p>
         <p> Chú ý: Mã chỉ có hiệu lực trong vòng 24h</p>
         <p><a href="{{route('login.xulyyeucaumatkhaumoi',['customer'=>id,'token'=>$customer->token])}}"></a>Nhấn vào đây</p>
    </div>
</div>
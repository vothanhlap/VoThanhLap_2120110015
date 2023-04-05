<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div class="col-heading content-body">
        <header class="section-heading">
            <h3 class="section-title">KHUYẾN MÃI SỐC</h3>
            <p>Ưu đãi và ưu đãi</p>
        </header><!-- sect-heading -->
        <div class="timer">
            <div> <span id="ngay" class="num">00</span> <small>Ngày</small></div>
            <div> <span id="gio" class="num">00</span> <small>Giờ</small></div>
            <div> <span id="phut" class="num">00</span> <small>Phút</small></div>
            <div> <span id="giay" class="num">00</span> <small>Giây</small></div>
        </div>
    </div> <!-- col.// -->
    <script>
        countdonwn('30/04/2023',['ngay','gio','phut','giay'],function(){
            console.log('done')
        })
    </script> 
    <script src="conunt.js"></script>
</body>  
</html>
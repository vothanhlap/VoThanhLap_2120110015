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
        <div id="clockdiv">
            <div>
                <span id="h" class="days">:</span>
                <div class="smalltext">Ngày</div>
            </div>
            <div>
                <span id="h" class="hours">:</span>
                <div class="smalltext">Giờ</div>
            </div>
            <div>
                <span id="h" class="minutes">:</span>
                <div class="smalltext">Phút</div>
            </div>
            <div>
                <span id="h" class="seconds">:</span>
                <div class="smalltext">Giây</div>
            </div>
        </div>

    </div> <!-- col.// -->
    <script>
        function getTimeRemaining(endtime) {
            var t = Date.parse(endtime) - Date.parse(new Date());
            var seconds = Math.floor((t / 1000) % 60);
            var minutes = Math.floor((t / 1000 / 60) % 60);
            var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
            var days = Math.floor(t / (1000 * 60 * 60 * 24));
            return {
                'total': t,
                'days': days,
                'hours': hours,
                'minutes': minutes,
                'seconds': seconds
            };
        }

        function initializeClock(id, endtime) {
            var clock = document.getElementById(id);
            var daysSpan = clock.querySelector('.days');
            var hoursSpan = clock.querySelector('.hours');
            var minutesSpan = clock.querySelector('.minutes');
            var secondsSpan = clock.querySelector('.seconds');

            function updateClock() {
                var t = getTimeRemaining(endtime);

                daysSpan.innerHTML = t.days;
                hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
                minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

                if (t.total <= 0) {
                    clearInterval(timeinterval);
                }
            }

            updateClock();
            var timeinterval = setInterval(updateClock, 1000);
        }

        var deadline = new Date(Date.parse(new Date()) + 10 * 24 * 60 * 60 * 1000);
        initializeClock('clockdiv', deadline);
    </script>
</body>

</html>
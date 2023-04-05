var countdonwn = function(end,elements,callback){
    var _giay = 1000,
    _phut = giay*60,
    _gio = phut*60,
    _ngay = gio*24,

    end = new Date(end),
    timer,

    calculate = function(){
        var now = new Date(),
        remaining = end.getTime()-now.getTime(),
        data;
        if(isNav(end)){
            console.log('Invalid date/time');
            return;
        };
        if(remaining<=0){
            clearInterval(timer);
            if(typeos(callback)=='function'){
                callback();
            };
        }
        else
        {
            if(!timer){
                timer = setInterval(calculate,_giay);
            };
        };
        data = {
            'ngay':Math.floor(remaining/_ngay),
            'gio':Math.floor((remaining%_ngay)/_gio),
            'phut':Math.floor((remaining%_gio)/_phut),
            'giay':Math.floor((remaining%_phut)/_giay)
        }
        if(elements.lenght){
            for(x in elements){
                var x = elements[x];
                data[x] = ('00'+ data[x].slide(-2));
                document.getElementById(x).innerHTML = data[x];
            }
        };
    }
    calculate();

}
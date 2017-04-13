$(function(){
    $('#container').bind('mousedown', function(){
        $('#container').bind('mousemove', function(e){
            var x = e.originalEvent.pageX;
            var y = e.originalEvent.pageY;

            var width = $(this).width();
            var height = $(this).height();

            $(this).css('left', x + 'px').css('top', y + 'px');
        });
    });

    $('#container').bind('mouseup', function(){
        $('#container').unbind('mousemove');
    });

    $('button').bind('click', function(){
        var city = $('#city').val();
        var now = new Date();
        var tempURL = 'https://query.yahooapis.com/v1/public/yql?format=json&rnd=' + now.getFullYear() + now.getMonth() + now.getDay() + now.getHours() + '&diagnostics=true&callback=&q=';
        tempURL += 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="'+city+'") and u="c"';

        $.ajax({
            url:encodeURI(tempURL),
            dataType:'json',
            type:'GET',
            success:function(data){
                if(data !== null && data.query !== null && data.query.results !== null && data.query.results.channel.description !== 'Yahoo! Weather Error'){
                    var temp = data.query.results.channel.item.condition.temp;
                    $('#res').html(temp+'°C');
                    console.log(data);
                }
            },
            error:function(){
                $('#res').html("ERRO");
            }
        });
    });
});
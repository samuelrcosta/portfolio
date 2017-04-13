var now = new Date;
var dias= new Array ("Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado");
var meses = new Array ("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Agosto", "Outubro", "Novembro", "Dezembro");

var dia_semana = now.getDay();
switch (dia_semana){
    case 0:
        dia_semana = dias[0];
        break;
    case 1:
        dia_semana = dias[1];
        break;
    case 2:
        dia_semana = dias[2];
        break;
    case 3:
        dia_semana = dias[3];
        break;
    case 4:
        dia_semana = dias[4];
        break;
    case 5:
        dia_semana = dias[5];
        break;
    case 6:
        dia_semana = dias[6];
        break;
}

var dia = now.getDate();
var mes = now.getMonth();
var mes_num = now.getMonth() + 1;
switch (mes) {
    case 0:
        mes = meses[0];
        break;
    case 1:
        mes = meses[1];
        break;
    case 2:
        mes = meses[2];
        break;
    case 3:
        mes = meses[3];
        break;
    case 4:
        mes = meses[4];
        break;
    case 5:
        mes = meses[5];
        break;
    case 6:
        mes = meses[6];
        break;
    case 7:
        mes = meses[7];
        break;
    case 8:
        mes = meses[8];
        break;
    case 9:
        mes = meses[9];
        break;
    case 10:
        mes = meses[10];
        break;
    case 11:
        mes = meses[11];
        break;
}
var ano = parseInt(now.getFullYear());

var data_atual = new Date(mes_num+'/'+dia+'/'+ano);

var _MS_PER_DAY = 1000 * 60 * 60 * 24;
// a and b are javascript Date objects
function subtrair_data(a, b) {
    // Discard the time and time-zone information.
    var utc1 = Date.UTC(a.getFullYear(), a.getMonth(), a.getDate());
    var utc2 = Date.UTC(b.getFullYear(), b.getMonth(), b.getDate());

    return Math.floor((utc2 - utc1) / _MS_PER_DAY);
}

$(function() {
    $('#painel-data').html(dia_semana + ", " + dia + " de " + mes + " de " + ano);
    for(var i = 0; i < $('.nota').length; i++){
        var temp = $('.nota')[i];
        if($(temp).hasClass('previsao') == false){
            if (parseFloat($(temp).html()) < 6){
                $(temp).css("background-color", "#FFFF00");
            }
        }
    }
    for(var i = 0; i < $('.final').length; i++){
        var temp = $('.final')[i];
        if($(temp).attr("data-verifica") == "0"){
            if (parseFloat($(temp).html()) < 6){
                $(temp).css("background-color", "#FF6347");
            }
        }
    }
});

$(".seletor").bind("click", function () {
   var temp = $(this).attr("data-bimestre");
    temp = '.'+temp;
    $(temp).slideToggle();
});

window.onload = function () {
    if(parseFloat($(".nota").html()) < 6){
        $(this).css("background-color", "red");
    }
}
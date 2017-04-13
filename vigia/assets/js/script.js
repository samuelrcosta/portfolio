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
});

$(function() {
    $('.list-group-item').bind('click', function(){
        $(this).find('.prova-detalhes').slideToggle();
    });

    for(i = 1;i < $('.prova-detalhes').length + 1;i++){
        var day = $('#p'+i).attr("data-dia");
        var month = $('#p'+i).attr("data-mes");
        var data_prova = new Date(month+'/'+day+'/2017');
        if (subtrair_data(data_atual, data_prova) > 0){
            $('#p'+i).parent().parent().parent().find('.entry-no').html('Dias para prova: ' + subtrair_data(data_atual, data_prova));
        }

        if($('#p'+i).attr("data-entregue") == '0') {
            if (subtrair_data(data_atual, data_prova) < 0) {
                var dif = subtrair_data(data_atual, data_prova) * -1;

                if (dif > 15){
                    $('#p' + i).parent().parent().parent().find('.btn-li').removeClass('btn-normal');
                    $('#p' + i).parent().parent().parent().find('.btn-li').addClass('btn-atrasado');
                }

                if (dif == 1) {
                    $('#p' + i).html(dif + ' dia atrasado');
                }
                else {
                    $('#p' + i).html(dif + ' dias atrasados');
                }
                $('#p' + i).show();
            }
        }
        else{
            $('#p' + i).html('Entregue');
            $('#p' + i).show();
            $('#p'+i).parent().parent().parent().find('.entry-no').hide();
        }
        var nota = parseFloat($('#p'+i).attr("data-nota"));
        if (nota > 0 && nota < 6){
            $('#p' + i).parent().parent().parent().find('.btn-li').removeClass('btn-normal');
            $('#p' + i).parent().parent().parent().find('.btn-li').addClass('btn-danger');
        } else if (nota >= 6 && nota < 7.5){
            $('#p' + i).parent().parent().parent().find('.btn-li').removeClass('btn-normal');
            $('#p' + i).parent().parent().parent().find('.btn-li').addClass('btn-warning');
        } else if (nota >= 7.5){
            $('#p' + i).parent().parent().parent().find('.btn-li').removeClass('btn-normal');
            $('#p' + i).parent().parent().parent().find('.btn-li').addClass('btn-success');
        }

        if ($('#p'+i).attr("data-nota") == ""){
            $('#p'+i).parent().parent().parent().find(".nota").hide();
        }

        if ($('#p'+i).attr("data-anotacoes") == ""){
            $('#p'+i).parent().parent().parent().find(".anotacoes").hide();
        }
    }
});
window.onload = function () {
    setTimeout(function () {
        if($("#retornosessao") != null){
            $("#retornosessao").slideUp();
        }
    },2000);

    $.ajax(
        {
            url: "sessao.php",
            cache: false
        })
        .done(function(result)
        {
            var sessao = $.parseJSON(result);
            if(sessao.permissao == 1){
                $(".editar").show();
                $("#cadastrarprova").show();
            }
        });
}
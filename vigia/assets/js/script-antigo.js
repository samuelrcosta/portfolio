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
    $('#painel-data').html(dia_semana + ", dia " + dia + " de " + mes + " de " + ano);
});

var profs = new Array('Alinne', 'Edvaldo (Jr)', 'Eurípedes', 'Karla', 'Luciano', 'Tiago', 'Alessandra', 'Bárbara', 'Isaque', 'Ronaldo', 'Hudson', 'Cristiano', 'Wilmont', 'Danúbia', 'Andrea - Lit', 'Andrea - Red', 'Vânio', 'Marília', 'Maria Helena', 'Hamilton', 'Rafael');
/*
 qt_profs = 20;
 Alinne = 0
 Edvaldo (Jr) = 1
 Eurípedes = 2
 Karla = 3
 Luciano = 4
 Tiago = 5
 Alessandra = 6
 Bárbara = 7
 Isaque = 8
 Ronaldo = 9
 Hudson = 10
 Cristiano = 11
 Wilmont = 12
 Danúbia = 13
 Andrea - Lit = 14
 Andrea - Red = 15
 Vânio = 16
 Marília = 17
 Maria Helena = 18
 Hamilton = 19
 Rafael = 20
 */

var app = angular.module("meuApp", []);
app.controller("meuCtrl", function($scope){
    $scope.provas1 = provas1;
    $scope.provas2 = provas2;
    $scope.provas3 = provas3;
    $scope.provas4 = provas4;
});

$(function() {
    $('.list-group-item').bind('click', function(){
        $(this).find('.prova-detalhes').slideToggle();
    });

    for(i = 1;i < 165;i++){
        var day = $('#p'+i).find('.dia').text();
        var month = $('#p'+i).find('.mes').text();
        var data_prova = new Date(month+'/'+day+'/2017');
        if (subtrair_data(data_atual, data_prova) > 0){
            $('#p'+i).parent().parent().parent().find('.entry-no').html('Dias para prova: ' + subtrair_data(data_atual, data_prova));
        }

        if($('#p'+i).find('.entregue').text() == '0') {
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
        }
        var nota = parseInt($('#p'+i).parent().parent().parent().find('.nota').text());
        if (nota > 0 && nota < 6){
            $('#p' + i).parent().parent().parent().find('.btn-li').removeClass('btn-normal');
            $('#p' + i).parent().parent().parent().find('.btn-li').addClass('btn-danger');
        } else if (nota >= 6 && nota < 7){
            $('#p' + i).parent().parent().parent().find('.btn-li').removeClass('btn-normal');
            $('#p' + i).parent().parent().parent().find('.btn-li').addClass('btn-warning');
        } else if (nota >= 7){
            $('#p' + i).parent().parent().parent().find('.btn-li').removeClass('btn-normal');
            $('#p' + i).parent().parent().parent().find('.btn-li').addClass('btn-success');
        }
    }
});

var provas1 = [
    {'n':1, 'prova':'Gramática', 'dia':27, 'mes':1, 'professor':profs[13], 'tipo':1, 'anotacao':'', 'entregue':1, 'Nota':6.7},
    {'n':2, 'prova':'Geografia', 'dia':27, 'mes':1, 'professor':profs[12], 'tipo':1,'anotacao':'', 'entregue':1, 'Nota':6.0},
    {'n':3, 'prova':'Espanhol', 'dia':27, 'mes':1, 'professor':profs[17], 'tipo':1,'anotacao':'', 'entregue':1, 'Nota':7.5},
    {'n':4, 'prova':'Biologia', 'dia':27, 'mes':1, 'professor':profs[5], 'tipo':1,'anotacao':'', 'entregue':1, 'Nota':5.0},
    {'n':5, 'prova':'Biologia', 'dia':27, 'mes':1, 'professor':profs[6], 'tipo':1,'anotacao':'', 'entregue':1, 'Nota':5.4},
    {'n':6, 'prova':'Biologia', 'dia':27, 'mes':1, 'professor':profs[7], 'tipo':1,'anotacao':'', 'entregue':1, 'Nota':4.9},
    {'n':7, 'prova':'Física', 'dia':3, 'mes':2, 'professor':profs[1], 'tipo':1,'anotacao':'', 'entregue':1, 'Nota':6.0},
    {'n':8, 'prova':'Física', 'dia':3, 'mes':2, 'professor':profs[0], 'tipo':1,'anotacao':'', 'entregue':1, 'Nota':3.8},
    {'n':9, 'prova':'Literatura', 'dia':3, 'mes':2, 'professor':profs[14], 'tipo':1,'anotacao':'', 'entregue':1, 'Nota':5.0},
    {'n':10, 'prova':'Inglês', 'dia':3, 'mes':2, 'professor':profs[16], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':11, 'prova':'Artes', 'dia':3, 'mes':2, 'professor':profs[20], 'tipo':1,'anotacao':'', 'entregue':1, 'Nota':3.5},
    {'n':12, 'prova':'Filosofia', 'dia':10, 'mes':2, 'professor':profs[18], 'tipo':1,'anotacao':'', 'entregue':1, 'Nota':6.6},
    {'n':13, 'prova':'Química', 'dia':10, 'mes':2, 'professor':profs[8], 'tipo':1,'anotacao':'', 'entregue':1, 'Nota':7.8},
    {'n':14, 'prova':'Química', 'dia':10, 'mes':2, 'professor':profs[9], 'tipo':1,'anotacao':'', 'entregue':1, 'Nota':6.5},
    {'n':15, 'prova':'História', 'dia':10, 'mes':2, 'professor':profs[10], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':16, 'prova':'História', 'dia':10, 'mes':2, 'professor':profs[11], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':17, 'prova':'Sociologia', 'dia':10, 'mes':2, 'professor':profs[18], 'tipo':1,'anotacao':'', 'entregue':1, 'Nota':5.5},
    {'n':18, 'prova':'Matemática', 'dia':17, 'mes':2, 'professor':profs[2], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':19, 'prova':'Matemática', 'dia':17, 'mes':2, 'professor':profs[3], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':20, 'prova':'Matemática', 'dia':17, 'mes':2, 'professor':profs[4], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':21, 'prova':'Ed. Física', 'dia':17, 'mes':2, 'professor':profs[19], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':22, 'prova':'Gramática', 'dia':3, 'mes':3, 'professor':profs[13], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':23, 'prova':'Geografia', 'dia':3, 'mes':3, 'professor':profs[12], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':24, 'prova':'Espanhol', 'dia':3, 'mes':3, 'professor':profs[17], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':25, 'prova':'Biologia', 'dia':3, 'mes':3, 'professor':profs[5], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':26, 'prova':'Biologia', 'dia':3, 'mes':3, 'professor':profs[6], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':27, 'prova':'Biologia', 'dia':3, 'mes':3, 'professor':profs[7], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':28, 'prova':'Física', 'dia':10, 'mes':3, 'professor':profs[1], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':29, 'prova':'Física', 'dia':10, 'mes':3, 'professor':profs[0], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':30, 'prova':'Literatura', 'dia':10, 'mes':3, 'professor':profs[14], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':31, 'prova':'Inglês', 'dia':10, 'mes':3, 'professor':profs[16], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':32, 'prova':'Artes', 'dia':10, 'mes':3, 'professor':profs[20], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':33, 'prova':'Filosofia', 'dia':10, 'mes':3, 'professor':profs[18], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':34, 'prova':'Química', 'dia':17, 'mes':3, 'professor':profs[8], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':35, 'prova':'Química', 'dia':17, 'mes':3, 'professor':profs[9], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':36, 'prova':'História', 'dia':17, 'mes':3, 'professor':profs[10], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':37, 'prova':'História', 'dia':17, 'mes':3, 'professor':profs[11], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':38, 'prova':'Sociologia', 'dia':17, 'mes':3, 'professor':profs[18], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':39, 'prova':'Matemática', 'dia':24, 'mes':3, 'professor':profs[2], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':40, 'prova':'Matemática', 'dia':24, 'mes':3, 'professor':profs[3], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':41, 'prova':'Matemática', 'dia':24, 'mes':3, 'professor':profs[4], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0}
];
var provas2 = [
    {'n':42, 'prova':'Gramática', 'dia':7, 'mes':4, 'professor':profs[13], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':43, 'prova':'Geografia', 'dia':7, 'mes':4, 'professor':profs[12], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':44, 'prova':'Espanhol', 'dia':7, 'mes':4, 'professor':profs[17], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':45, 'prova':'Biologia', 'dia':7, 'mes':4, 'professor':profs[5], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':46, 'prova':'Biologia', 'dia':7, 'mes':4, 'professor':profs[6], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':47, 'prova':'Biologia', 'dia':7, 'mes':4, 'professor':profs[7], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':48, 'prova':'Física', 'dia':12, 'mes':4, 'professor':profs[1], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':49, 'prova':'Física', 'dia':12, 'mes':4, 'professor':profs[0], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':50, 'prova':'Literatura', 'dia':12, 'mes':4, 'professor':profs[14], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':51, 'prova':'Inglês', 'dia':12, 'mes':4, 'professor':profs[16], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':52, 'prova':'Artes', 'dia':12, 'mes':4, 'professor':profs[20], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':53, 'prova':'Filosofia', 'dia':20, 'mes':4, 'professor':profs[18], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':54, 'prova':'Química', 'dia':20, 'mes':4, 'professor':profs[8], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':55, 'prova':'Química', 'dia':20, 'mes':4, 'professor':profs[9], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':56, 'prova':'História', 'dia':20, 'mes':4, 'professor':profs[10], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':57, 'prova':'História', 'dia':20, 'mes':4, 'professor':profs[11], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':58, 'prova':'Sociologia', 'dia':20, 'mes':4, 'professor':profs[18], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':59, 'prova':'Matemática', 'dia':5, 'mes':5, 'professor':profs[2], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':60, 'prova':'Matemática', 'dia':5, 'mes':5, 'professor':profs[3], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':61, 'prova':'Matemática', 'dia':5, 'mes':5, 'professor':profs[4], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':62, 'prova':'Ed. Física', 'dia':5, 'mes':5, 'professor':profs[19], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':63, 'prova':'Gramática', 'dia':12, 'mes':5, 'professor':profs[13], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':64, 'prova':'Geografia', 'dia':12, 'mes':5, 'professor':profs[12], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':65, 'prova':'Espanhol', 'dia':12, 'mes':5, 'professor':profs[17], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':66, 'prova':'Biologia', 'dia':12, 'mes':5, 'professor':profs[5], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':67, 'prova':'Biologia', 'dia':12, 'mes':5, 'professor':profs[6], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':68, 'prova':'Biologia', 'dia':12, 'mes':5, 'professor':profs[7], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':69, 'prova':'Física', 'dia':19, 'mes':5, 'professor':profs[1], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':70, 'prova':'Física', 'dia':19, 'mes':5, 'professor':profs[0], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':71, 'prova':'Literatura', 'dia':19, 'mes':5, 'professor':profs[14], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':72, 'prova':'Inglês', 'dia':19, 'mes':5, 'professor':profs[16], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':73, 'prova':'Artes', 'dia':19, 'mes':5, 'professor':profs[20], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':74, 'prova':'Filosofia', 'dia':19, 'mes':5, 'professor':profs[18], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':75, 'prova':'Química', 'dia':26, 'mes':5, 'professor':profs[8], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':76, 'prova':'Química', 'dia':26, 'mes':5, 'professor':profs[8], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':77, 'prova':'História', 'dia':26, 'mes':5, 'professor':profs[10], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':78, 'prova':'História', 'dia':26, 'mes':5, 'professor':profs[11], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':79, 'prova':'Sociologia', 'dia':26, 'mes':5, 'professor':profs[18], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':80, 'prova':'Matemática', 'dia':2, 'mes':6, 'professor':profs[2], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':81, 'prova':'Matemática', 'dia':2, 'mes':6, 'professor':profs[3], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':82, 'prova':'Matemática', 'dia':2, 'mes':6, 'professor':profs[4], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0}
];
var provas3 = [
    {'n':83, 'prova':'Gramática', 'dia':9, 'mes':6, 'professor':profs[13], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':84, 'prova':'Geografia', 'dia':9, 'mes':6, 'professor':profs[12], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':85, 'prova':'Espanhol', 'dia':9, 'mes':6, 'professor':profs[17], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':86, 'prova':'Biologia', 'dia':9, 'mes':6, 'professor':profs[5], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':87, 'prova':'Biologia', 'dia':9, 'mes':6, 'professor':profs[6], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':88, 'prova':'Biologia', 'dia':9, 'mes':6, 'professor':profs[7], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':89, 'prova':'Física', 'dia':14, 'mes':6, 'professor':profs[1], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':90, 'prova':'Física', 'dia':14, 'mes':6, 'professor':profs[0], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':91, 'prova':'Literatura', 'dia':14, 'mes':6, 'professor':profs[14], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':92, 'prova':'Inglês', 'dia':14, 'mes':6, 'professor':profs[16], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':93, 'prova':'Artes', 'dia':14, 'mes':6, 'professor':profs[20], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':94, 'prova':'Filosofia', 'dia':14, 'mes':6, 'professor':profs[18], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':95, 'prova':'Química', 'dia':30, 'mes':6, 'professor':profs[8], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':96, 'prova':'Química', 'dia':30, 'mes':6, 'professor':profs[9], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':97, 'prova':'História', 'dia':30, 'mes':6, 'professor':profs[10], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':98, 'prova':'História', 'dia':30, 'mes':6, 'professor':profs[11], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':99, 'prova':'Sociologia', 'dia':30, 'mes':6, 'professor':profs[18], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':100, 'prova':'Matemática', 'dia':11, 'mes':8, 'professor':profs[2], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':101, 'prova':'Matemática', 'dia':11, 'mes':8, 'professor':profs[3], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':102, 'prova':'Matemática', 'dia':11, 'mes':8, 'professor':profs[4], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':103, 'prova':'Ed. Física', 'dia':11, 'mes':8, 'professor':profs[19], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':104, 'prova':'Gramática', 'dia':18, 'mes':8, 'professor':profs[13], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':105, 'prova':'Geografia', 'dia':18, 'mes':8, 'professor':profs[12], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':106, 'prova':'Espanhol', 'dia':18, 'mes':8, 'professor':profs[17], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':107, 'prova':'Biologia', 'dia':18, 'mes':8, 'professor':profs[5], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':108, 'prova':'Biologia', 'dia':18, 'mes':8, 'professor':profs[6], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':109, 'prova':'Biologia', 'dia':18, 'mes':8, 'professor':profs[7], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':110, 'prova':'Física', 'dia':25, 'mes':8, 'professor':profs[1], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':111, 'prova':'Física', 'dia':25, 'mes':8, 'professor':profs[0], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':112, 'prova':'Literatura', 'dia':25, 'mes':8, 'professor':profs[14], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':113, 'prova':'Inglês', 'dia':25, 'mes':8, 'professor':profs[16], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':114, 'prova':'Artes', 'dia':25, 'mes':8, 'professor':profs[20], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':115, 'prova':'Filosofia', 'dia':25, 'mes':8, 'professor':profs[18], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':116, 'prova':'Química', 'dia':1, 'mes':9, 'professor':profs[8], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':117, 'prova':'Química', 'dia':1, 'mes':9, 'professor':profs[9], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':118, 'prova':'História', 'dia':1, 'mes':9, 'professor':profs[10], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':119, 'prova':'História', 'dia':1, 'mes':9, 'professor':profs[11], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':120, 'prova':'Sociologia', 'dia':1, 'mes':9, 'professor':profs[18], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':121, 'prova':'Matemática', 'dia':6, 'mes':9, 'professor':profs[2], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':122, 'prova':'Matemática', 'dia':6, 'mes':9, 'professor':profs[3], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':123, 'prova':'Matemática', 'dia':6, 'mes':9, 'professor':profs[4], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0}
];
var provas4 = [
    {'n':124, 'prova':'Gramática', 'dia':15, 'mes':9, 'professor':profs[13], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':125, 'prova':'Geografia', 'dia':15, 'mes':9, 'professor':profs[12], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':126, 'prova':'Espanhol', 'dia':15, 'mes':9, 'professor':profs[17], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':127, 'prova':'Biologia', 'dia':15, 'mes':9, 'professor':profs[5], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':128, 'prova':'Biologia', 'dia':15, 'mes':9, 'professor':profs[6], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':129, 'prova':'Biologia', 'dia':15, 'mes':9, 'professor':profs[7], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':130, 'prova':'Física', 'dia':22, 'mes':9, 'professor':profs[1], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':131, 'prova':'Física', 'dia':22, 'mes':9, 'professor':profs[0], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':132, 'prova':'Literatura', 'dia':22, 'mes':9, 'professor':profs[14], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':133, 'prova':'Inglês', 'dia':22, 'mes':9, 'professor':profs[16], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':134, 'prova':'Artes', 'dia':22, 'mes':9, 'professor':profs[20], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':135, 'prova':'Filosofia', 'dia':22, 'mes':9, 'professor':profs[18], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':136, 'prova':'Química', 'dia':29, 'mes':9, 'professor':profs[8], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':137, 'prova':'Química', 'dia':29, 'mes':9, 'professor':profs[9], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':138, 'prova':'História', 'dia':29, 'mes':9, 'professor':profs[10], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':139, 'prova':'História', 'dia':29, 'mes':9, 'professor':profs[11], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':140, 'prova':'Sociologia', 'dia':29, 'mes':9, 'professor':profs[18], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':141, 'prova':'Matemática', 'dia':6, 'mes':10, 'professor':profs[2], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':142, 'prova':'Matemática', 'dia':6, 'mes':10, 'professor':profs[3], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':143, 'prova':'Matemática', 'dia':6, 'mes':10, 'professor':profs[4], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':144, 'prova':'Ed. Física', 'dia':6, 'mes':10, 'professor':profs[19], 'tipo':1,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':145, 'prova':'Gramática', 'dia':11, 'mes':10, 'professor':profs[13], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':146, 'prova':'Geografia', 'dia':11, 'mes':10, 'professor':profs[12], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':147, 'prova':'Espanhol', 'dia':11, 'mes':10, 'professor':profs[17], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':148, 'prova':'Biologia', 'dia':11, 'mes':10, 'professor':profs[5], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':149, 'prova':'Biologia', 'dia':11, 'mes':10, 'professor':profs[6], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':150, 'prova':'Biologia', 'dia':11, 'mes':10, 'professor':profs[7], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':151, 'prova':'Física', 'dia':20, 'mes':10, 'professor':profs[1], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':152, 'prova':'Física', 'dia':20, 'mes':10, 'professor':profs[0], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':153, 'prova':'Literatura', 'dia':20, 'mes':10, 'professor':profs[14], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':154, 'prova':'Inglês', 'dia':20, 'mes':10, 'professor':profs[16], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':155, 'prova':'Artes', 'dia':20, 'mes':10, 'professor':profs[20], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':156, 'prova':'Filosofia', 'dia':20, 'mes':10, 'professor':profs[18], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':157, 'prova':'Química', 'dia':27, 'mes':10, 'professor':profs[8], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':158, 'prova':'Química', 'dia':27, 'mes':10, 'professor':profs[9], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':159, 'prova':'História', 'dia':27, 'mes':10, 'professor':profs[10], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':160, 'prova':'História', 'dia':27, 'mes':10, 'professor':profs[11], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':161, 'prova':'Sociologia', 'dia':27, 'mes':10, 'professor':profs[18], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':162, 'prova':'Matemática', 'dia':1, 'mes':11, 'professor':profs[2], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':163, 'prova':'Matemática', 'dia':1, 'mes':11, 'professor':profs[3], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0},
    {'n':164, 'prova':'Matemática', 'dia':1, 'mes':11, 'professor':profs[4], 'tipo':2,'anotacao':'', 'entregue':0, 'Nota':0.0}
];

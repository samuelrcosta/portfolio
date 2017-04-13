var now = new Date;
var ano = parseInt(now.getFullYear());
function mascara_data(data){
    var mydata = '';
    mydata = mydata + data;
    if (mydata.length == 2){
        mydata = mydata + '/';
        $("#data").val(mydata);
    }
    if (mydata.length == 5){
        $("#data").val(mydata);
    }
}

function verifica_data () {

    dia = ($("#data").val().substring(0,2));
    mes = ($("#data").val().substring(3,5));
    var retorno = 0;
    situacao = "";
    // verifica o dia valido para cada mes
    if ((dia < 01)||(dia < 01 || dia > 30) && (  mes == 04 || mes == 06 || mes == 09 || mes == 11 ) || dia > 31) {
        situacao = "falsa";
    }

    // verifica se o mes e valido
    if (mes < 01 || mes > 12 ) {;
        situacao = "falsa";
    }
    if(ano%4 == 0){
        if(ano%100 == 0){
            if(ano%400 == 0){
                if(mes == 02 && dia > 29){
                    situacao = "falsa";
                }
            }else{
                if(mes == 02 && dia > 28){
                    situacao = "falsa";
                }
            }
        }else{
            if(mes == 02 && dia > 29){
                situacao = "falsa";
            }
        }
    }else{
        if(mes == 02 && dia > 28){
            situacao = "falsa";
        }
    }

    if ($("#data").val() == "") {
        situacao = "falsa";
    }

    if (situacao == "falsa") {
        retorno = -1;
        $("#data").focus();
    }

    return retorno;
}
$("#r").css("margin-left", "20px");
$(".div").css("margin-left", "20px");
$(function(){
   $("#calc").bind("click", function(e){
       e.preventDefault();
        var h = $("#h").val();
       h = h.replace(',', '.');
        var p = $("#p").val();
       p = p.replace(',', '.');
        var r = p/(h*h);
        var imc;
       if(r < 17){
           imc = "Baixo peso grave";
           $(".div").css("color", "red");
       } else if(r >= 17 && r < 19){
           imc = "Baixo peso";
           $(".div").css("color", "#FF8C00");
       } else if(r >= 19 && r < 25){
           imc = "Peso normal";
           $(".div").css("color", "black");
       } else if(r >= 25 && r < 30){
           imc = "Sobrepeso";
           $(".div").css("color", "#FF8C00");
       } else if(r >= 30 && r < 35){
           imc = "Obesidade grau I";
           $(".div").css("color", "red");
       } else if(r >= 35 && r < 40){
           imc = "Obesidade grau II";
           $(".div").css("color", "red");
       } else if(r >= 40){
           imc = "Obesidade grau III (Obesidade mórbida)";
           $(".div").css("color", "red");
       }
        $(".div").html(imc);
       r = r.toString();
       r = r.replace('.', ',');
       $("#r").val(r + " kg/m²");
   })
});
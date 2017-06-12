var slideItem = 0;

window.onload = function () {
    setInterval(passarSlide, 10000);
    document.getElementById("bolinha"+slideItem).style.backgroundColor = "#494949";
    var slidewidth = document.getElementById("slideshow").offsetWidth;
    var objs = document.getElementsByClassName("slide");
    var t = objs.length;
    document.getElementsByClassName("slideshowarea")[0].style.width = (slidewidth * t)+"px";
    for(var i = 0; i < t; i++){
        objs[i].style.width = slidewidth+"px";
    }
}

window.onresize = function(){
    var slidewidth = document.getElementById("slideshow").offsetWidth;
    var objs = document.getElementsByClassName("slide");
    var t = objs.length;
    document.getElementsByClassName("slideshowarea")[0].style.width = (slidewidth * t)+"px";
    for(var i = 0; i < t; i++){
        objs[i].style.width = slidewidth+"px";
    }
}

function passarSlide () {
    document.getElementById("bolinha0").style.backgroundColor = "#CCC";
    document.getElementById("bolinha1").style.backgroundColor = "#CCC";
    document.getElementById("bolinha2").style.backgroundColor = "#CCC";
    document.getElementById("bolinha3").style.backgroundColor = "#CCC";
    var slidewidth = document.getElementById("slideshow").offsetWidth;

    if(slideItem >= 3){
        slideItem = 0;
    } else{
        slideItem++;
    }

    document.getElementsByClassName("slideshowarea")[0].style.marginLeft = "-"+(slidewidth * slideItem)+"px";
    document.getElementById("bolinha"+slideItem).style.backgroundColor = "#494949";
}

function mudarSlide(pos) {
    slideItem = pos;
    document.getElementById("bolinha0").style.backgroundColor = "#CCC";
    document.getElementById("bolinha1").style.backgroundColor = "#CCC";
    document.getElementById("bolinha2").style.backgroundColor = "#CCC";
    document.getElementById("bolinha3").style.backgroundColor = "#CCC";
    var slidewidth = document.getElementById("slideshow").offsetWidth;
    document.getElementsByClassName("slideshowarea")[0].style.marginLeft = "-"+(slidewidth * slideItem)+"px";
    document.getElementById("bolinha"+slideItem).style.backgroundColor = "#494949";
}

function muda(n){
    document.getElementById(n).style.backgroundColor="#FF0000";
}
function voltar(n){
    document.getElementById(n).style.backgroundColor="#CCC";
}

if($('html').width() > 615){
    $(function(){
        $(".drop").hover(function(){
            $(this).find(".down").slideDown(200);
        }, function(){
            $(this).find(".down").slideUp(200);
        });
    });
}

function toggleMenu() {
    var menu = document.getElementsByClassName("menuint")[0];
    if($(".menuint").css("display") == "none"){
        $(".menuint").slideDown('fast');
    }else{
        $(".menuint").slideUp('fast');
    }
}
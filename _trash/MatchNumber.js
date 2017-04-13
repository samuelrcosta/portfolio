window.onload = function(){
    reset();
}

function match() {
    num1 = parseInt(document.getElementById("left").innerHTML);
    num2 = parseInt(document.getElementById("numero").value);

    if(num1 == num2){
        document.getElementById("result").style.color = "#228B22";
        document.getElementById("result").innerHTML = "CORRETO!!";
    }else if (document.getElementById("numero").value == ""){
        document.getElementById("result").style.color = "#FFFFFF";
        document.getElementById("result").innerHTML = "DIGITE UM NUMERO!";
    }else{
        document.getElementById("result").style.color = "#FF0000";
        document.getElementById("result").innerHTML = "ERRADO!!";
    }
}

function reset() {
    num = Math.floor(Math.random()*100);
    document.getElementById("left").innerHTML = num;
    document.getElementById("numero").value = "";
    document.getElementById("result").innerHTML = "";
}
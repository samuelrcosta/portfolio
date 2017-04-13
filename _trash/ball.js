function start(){
    setInterval(addBall, 1000);
}

function addBall(){
    var bola = document.createElement("div");
    bola.setAttribute("class", "bola");

    var p1 = Math.floor(Math.random()*1000);
    var p2 = Math.floor(Math.random()*600);

    bola.setAttribute("style", "left:"+p1+"px;top:"+p2+"px;background-color:"+criarCor()+";");
    bola.setAttribute("onclick", "estourar(this)");

    document.body.appendChild(bola);
}

function estourar(elemento){
    document.body.removeChild(elemento);
}

function aleatorio(inferior,superior){
    numPossibilidades = superior - inferior;
    aleat = Math.random() * numPossibilidades;
    aleat = Math.floor(aleat);
    return parseInt(inferior) + aleat;
}

function criarCor(){
    hexadecimal = new Array("0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F");
    cor = "#";
    for(i=0; i<6;i++){
        pos = aleatorio(0,hexadecimal.length);
        cor += hexadecimal[pos];
    }
    return cor;
}
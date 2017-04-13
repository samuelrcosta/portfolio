var firebase = new Firebase("https://[meu banco].firebaseio.com/");

var profs = new Array('Alinne', 'Edvaldo (Jr)', 'Eurípedes', 'Karla', 'Luciano', 'Tiago', 'Alessandra', 'Bárbara', 'Isaque', 'Ronaldo', 'Hudson', 'Cristiano', 'Wilmont', 'Danúbia', 'Andrea - Lit', 'Andrea - Red', 'Vânio', 'Marília', 'Maria Helena', 'Hamilton', 'Rafael');

function criarJson(){
    firebase.set(
            {'n':1, 'prova':'Gramática', 'dia':27, 'mes':1, 'professor':'Danúbia', 'tipo':1, 'anotacao':'', 'entregue':1, 'Nota':6.7}
    );
}

function verBanco(){
    firebase.on("value", function (snapchot) {
        mostrarJson(snapchot.val());
    });
}

function mostrarJson(json) {
    document.getElementById("result").innerHTML = JSON.stringify(json);
}
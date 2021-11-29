function stopDefAction(evt) {
    evt.preventDefault();
}


function porcentagem(acoes, quantidade = 2) {

    
    var porcentagens = document.getElementsByClassName('porcentagem');

    var soma = 0;

    for(var i = 0; i < porcentagens.length; i++) {
        soma += parseInt(porcentagens[i].value);
    }
    
    if(soma!=100) {
        alert("A soma das porcentagens precisa totalizar 100%");

        // $("#cadastrar-carteira").on('submit', function(e){
        //     //e.preventDefault();
        //     return false;
        // });

        document.getElementById("#cadastrar-carteira").addEventListener("click", function(event){
            event.preventDefault()
          });

        //Event.preventDefault();
        //stopDefAction(evt);
        // document.getElementById('cadastrar-carteira').addEventListener("submit", function(event) {
        //     event.preventDefault();
        // }, false);
    }

}
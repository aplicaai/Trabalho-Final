function stopDefAction(evt) {
    evt.preventDefault();
}

function porcentagem() {

    
    var porcentagens = document.getElementsByClassName('porcentagem');

    var soma = 0;

    for(var i = 0; i < porcentagens.length; i++) {
        soma += parseInt(porcentagens[i].value);
    }
    
    if(soma!=100) {
        alert("A soma das porcentagens precisa totalizar 100%");
        soma = 0;
        var form = document.querySelector('form');
        form.addEventListener('submit', function(event){
            event.preventDefault();
          });
    } else {
        soma = 0;
        return '';
    }

}
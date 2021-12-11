function stopDefAction(evt) {
    evt.preventDefault();
}

function porcentagem() {

    
    var porcentagens = document.getElementsByClassName('porcentagem');

    var soma = 0;

    for(var i = 0; i < porcentagens.length; i++) {
        soma += parseFloat(porcentagens[i].value);
    }

    $('form').one('submit', function(e) {
        
        if(soma==100) {
            soma = 0;
            this.submit(); 
        } else {
            soma = 0;
            alert("A soma das porcentagens precisa totalizar 100%");
            e.preventDefault();
        }
        
    });


    // if(soma==100) {
    //     soma = 0;
    //     form.addEventListener('submit', function(event){
    //         event.submitter();
    //     });

    // } else {
    //     alert("A soma das porcentagens precisa totalizar 100%");
    //     soma = 0;    
    //     form.addEventListener('submit', function(event){
    //         event.preventDefault();
    //       });
    // }

}
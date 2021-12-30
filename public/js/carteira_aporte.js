//const { sample } = require("lodash");

function aporte() {

    var arr_quantidade = [];
    var arr_preco_acao = [];
    var arr_dist_obj = [];
    var arr_dist_porc = [];
    var arr_ativos = [];
    var patrimonio_acao = [];
    var total_patrimonio = 0;

    var valor_aporte = $("#btnAporte-valor").val();

    var valores = document.getElementsByClassName('valores'); 
    var ativos = document.getElementsByClassName('ativo');

    var quantidade = document.getElementsByClassName('quantidade');
    var preco_acao = document.getElementsByClassName('preco_acao');
    var dist_obj = document.getElementsByClassName('porcen_obj');
    var dist_porc = document.getElementsByClassName('porcen_distancia');


    for(var i = 0; i < dist_obj.length; i++) 
    {
        arr_quantidade.push(parseFloat(quantidade[i].textContent));
        arr_preco_acao.push(parseFloat(preco_acao[i].textContent));
        arr_dist_obj.push(parseFloat(dist_obj[i].textContent));
        arr_dist_porc.push(parseFloat(dist_porc[i].textContent));
        arr_ativos.push(ativos[i].textContent);
    }

    for(var i = 0; i < dist_obj.length; i++) 
    {
        patrimonio_acao.push(arr_quantidade[i]*arr_preco_acao[i]);
        total_patrimonio = total_patrimonio + (arr_quantidade[i]*arr_preco_acao[i]);
    }

    total_patrimonio = total_patrimonio + parseFloat(valor_aporte);

    var empresaVS = [];
    
    for(var i = 0; i < dist_obj.length; i++) 
    {
        empresaVS.push((arr_dist_obj[i]*total_patrimonio)/100);
    }

    totalAcoes = [];

    for(var i = 0; i < dist_obj.length; i++)
    {
        totalAcoes.push(empresaVS[i]/arr_preco_acao[i]);
    }

    var quantidade_sugerida = [];

    for(var i = 0; i < dist_obj.length; i++)
    {
        quantidade_sugerida.push((totalAcoes[i]-arr_quantidade[i]).toFixed(2));
    }
    
    var div = '';

    console.log(quantidade_sugerida);

    for(var i = 0; i < dist_obj.length; i++)
    {
        div = arr_ativos[i];
        
        document.getElementById(div).innerHTML = quantidade_sugerida[i];
    }

};
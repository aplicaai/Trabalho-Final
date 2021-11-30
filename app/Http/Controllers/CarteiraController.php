<?php

namespace App\Http\Controllers;
//use config\app.php;

//use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Input;
use AlphaVantage\Api;
use App\model\acao;
use App\model\Carteira;
use Http;



class CarteiraController extends Controller
{

    public function pegarDados() {
        $dados = acao::limit(3)->get();  
        $concatenado = '';

        for($d=0; $d < count($dados) ;$d++) {
            $concatenado = $concatenado.$dados[$d]['acao'].',';            
        }

        $resp = Http::get('https://api.hgbrasil.com/finance/stock_price?key=94741c91&fields=symbol,description,name,price,company_name&symbol='.$concatenado);
        $ret = $resp->json()['results'];

        return $ret;
    }

    public function valoresEscolhidos() {

    }

    public function cadastrar() { 
        $dados = $this->pegarDados();
        return view('pages.carteira-cadastrar', compact('dados'));        
    }

    public function carteira_valores(Request $request) {
        $nome = $request->get('nome_carteira');
        $valor_carteira = $request->get('valor_carteira');
        $valor = $request->get('checkbox');

        $acoesEscolhidas = [];
        $dados = $this->pegarDados();
        foreach($dados as $dado) {
            if(in_array($dado['symbol'], $valor)) {
                array_push($acoesEscolhidas, $dado);
            }
        }
        $contar = count($acoesEscolhidas);
        return view('pages.carteira-valores', compact('acoesEscolhidas', 'contar', 'valor', 'nome', 'valor_carteira'));
    }


    public function carteira_cadastrar() {
        
        $valor = $_POST['acao'];

        foreach($valor as $v) {
            $porcentagens[$v] = $_POST[$v];
        }

        $nome = $_POST['nome'];
        $valor_carteira = $_POST['valor_carteira'];

        //Busca valores
        $concatenado = '';
        foreach($valor as $v) {
            $concatenado = $concatenado.','.$v;
        }
        $resp = Http::get('https://api.hgbrasil.com/finance/stock_price?key=94741c91&fields=symbol,description,name,price,company_name&symbol='.$concatenado);
        $ret = $resp->json()['results'];

        foreach($ret as $r) {
            $porcentagens[$r['symbol']] = ($valor_carteira*$porcentagens[$r['symbol']])/100;
        }
        
        
        Carteira::create(['id_usuario'=>500,'acao'=>$nome, 'preco_acao'=>1]);
        exit;

        return view('pages.dashboard');
    }


    public function listar() {
        return view('pages.carteira-listar');
    }

    public function json(Request $request) {
        dd($request->all());
    }

}
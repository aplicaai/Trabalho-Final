<?php

namespace App\Http\Controllers;
//use config\app.php;

//use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Input;
use AlphaVantage\Api;
use App\model\acao;
use Http;

class CarteiraController extends Controller
{
    public function cadastrar() {
        
        $dados = acao::limit(5)->get();       

        foreach ($dados as $dado ) {

            $resp = Http::get('https://api.hgbrasil.com/finance/stock_price?key=aac5dccd&fields=price&symbol='.$dado->acao);
            $ret = $resp->json()['results'];

            if(array_key_exists($dado->acao, $ret)) {
                $dado->preco = $ret[$dado->acao];
            } else {
                $dado->preco = "Cotação R$ 0,00";
            }
        }

        return view('pages.carteira-cadastrar', compact('dados'));
        
    }

    public function listar() {
        return view('pages.carteira-listar');
    }

    public function lista_acoes(Request $request) {

        $nome_carteira = $request->get('nome_carteira');
        $valor_carteira = $request->get('valor_carteira');
        $check = $request->get('checkbox');
        dd($nome_carteira, $valor_carteira, $check);

        return view('pages.lista-acoes');
    }

    public function json(Request $request) {
        dd($request->all());
    }

}
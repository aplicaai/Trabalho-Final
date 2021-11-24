<?php

namespace App\Http\Controllers;
//use config\app.php;

//use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Input;
use AlphaVantage\Api;

class CarteiraController extends Controller
{
    public function cadastrar() {
        

        

        $url = 'https://fundamentus.com.br/detalhes.php?papel=';

        //dd(json_decode($url, true));

        $array = ['0' => 'ALPA4', '1' => 'ABEV3', '2' => 'AMER3'];
        $infos = [];
        $dados = [];

        foreach($array as $a) {
            $url = 'https://www.alphavantage.co/query?function=TIME_SERIES_DAILY&symbol='.$a.'.SA&outputsize=compact&apikey=T8HJ16FJW1AXFEHK';    
            array_push($infos ,json_decode(file_get_contents($url), true));
        }

        //dd($infos);

        foreach($infos as $info) {
            $symbol = $info ['Meta Data']['2. Symbol'];
            $price = reset($info ['Time Series (Daily)']);
            $price = $price['4. close'];
            array_push($dados, ['symbol' => $symbol, 'price' => $price]);
        }

        //exit;
        return view('pages.carteira-cadastrar', ['dados' => $dados, 'nomes' => $array]);
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
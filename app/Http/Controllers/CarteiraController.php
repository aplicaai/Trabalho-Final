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
use App\model\Acao_carteira;
use Auth;
use Http;



class CarteiraController extends Controller
{

    public function alterar($id_carteira) {

        $dadosAcao_carteiras = Acao_carteira::all()->where('id_carteira', '=', $id_carteira);

        $acao_carteiras = [];
        foreach($dadosAcao_carteiras as $ac) {
            $acao_carteiras[] = $ac;
        }

        return view('pages.carteira-alterar', compact('acao_carteiras'));

    }

    public function pegarDados() {
        $dados = acao::limit(10)->get();  
        // dd($dados);
        $concatenado = '';

        for($d=0; $d < count($dados) ;$d++) {
            $concatenado = $concatenado.$dados[$d]['acao'].',';    
            // dd($concatenado);        
        }

        $resp = Http::get('https://api.hgbrasil.com/finance/stock_price?key=94741c91&fields=symbol,description,name,price,company_name&symbol='.$concatenado);
        $ret = $resp->json()['results'];
        // dd($resp);
        return $ret;
    }

    public function valoresEscolhidos() {

    }

    public function cadastrar() { 
        $dados = $this->pegarDados();
        return view('pages.carteira-cadastrar', compact('dados'));        
    }

    public function carteira_alterar() {
        // dd($_POST);       
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

        $valores_calculados = '';
        foreach($ret as $r) {
            $valores_calculados[$r['symbol']] = ($valor_carteira*$porcentagens[$r['symbol']])/100;
        }
                
        Carteira::create(['id_usuario'=>Auth::id(),'nome'=>$nome, 'valor'=>$valor_carteira]);
        $id_carteira = Carteira::orderBy('created_at', 'desc')->get('id')->first();
        
        foreach($ret as $r) {
            Acao_carteira::create(['id_usuario'=>Auth::id(), 'id_carteira'=>$id_carteira->id, 'acao'=>$r['symbol'], 'valor'=>$valores_calculados[$r['symbol']], 'porcentagem'=>$porcentagens[$r['symbol']], 'preco_acao'=>$r['price']]);
        }

        return redirect('/dashboard');
    }


    public function listar() {
        
        $dadosCarteiras = Carteira::all()->where('id_usuario', '=', Auth::id());

        $carteiras = [];
        foreach($dadosCarteiras as $dc) {
           $carteiras[] = $dc;
        }

        return view('pages.carteira-listar', compact('carteiras'));
    }

    public function json(Request $request) {
        // dd($request->all());
    }

}
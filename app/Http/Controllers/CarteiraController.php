<?php

namespace App\Http\Controllers;
//use config\app.php;

//use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Input;
use AlphaVantage\Api;
use App\model\acao;
use App\model\Info_ativo;
use App\model\Carteira;
use App\model\Acao_carteira;
use Auth;
use Http;



class CarteiraController extends Controller
{

    public function atualizar_dados() 
    {
        $allDadosAcao = acao::limit(700)->get();
        $allDadosInfo = Info_ativo::all('name');

        $dados = [];
        foreach($allDadosAcao as $d) {
            array_push($dados,$d->acao);
        }
        $a = 0;
        $ret = [];

        foreach($dados as $d)
        {
            $concat = "https://api.hgbrasil.com/finance/stock_price?key=94741c91&fields=symbol,description,name,price,company_name&symbol=".$d.",";
            $a++;
            if($a == 4)
            {
                $a = 0;
                $resp = Http::get($concat);
                if(!empty($resp->json()['results']))
                {
                    array_push($ret, $resp->json()['results']);
                }
                $concat="https://api.hgbrasil.com/finance/stock_price?key=94741c91&fields=symbol,description,name,price,company_name&symbol=";
            }   
        }

        foreach($ret as $r1) 
        {
            foreach($r1 as $r)
            {
                Info_ativo::updateOrCreate(
                    
                    ['symbol' => $r['symbol']],
                    [
                    'name' => $r['name'],
                    'company_name' => $r['company_name'],
                    'description' => $r['description'],
                    'price' => $r['price']
                    ]
                    
                );
            }
        }

    }

    public function alterar($id_carteira) {

        $dadosAcao_carteiras = Acao_carteira::all()->where('id_carteira', '=', $id_carteira);

        $acao_carteiras = [];
        foreach($dadosAcao_carteiras as $ac) 
        {
            $acao_carteiras[] = $ac;
        }

        $valorTotal = 0;
        $patrimonioAtualizado = [];
        $participacaoAtual = [];

        foreach($acao_carteiras as $ac) 
        {
            $valorTotal = $valorTotal + $ac->preco_acao*$ac->quantidade;
            
        }

        foreach($acao_carteiras as $ac)
        {
            $ac['patrimonioAtualizado'] = $ac->quantidade*$ac->preco_acao;
            $ac['participacaoAtual'] = round(($ac['patrimonioAtualizado']*100)/$valorTotal,2);
        }

        //dd($acao_carteiras);


        return view('pages.carteira-alterar', compact('acao_carteiras'));

    }

    public function pegarDados() {
        $allDados = Info_ativo::all();
        $ret = [];
        foreach($allDados as $al) 
        {
            array_push($ret,$al);
        }
        return $ret;
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


    public function carteira_cadastrar() 
    {
        $valor = $_POST['acao'];

        foreach($valor as $v) {
            $porcentagens[$v] = $_POST[$v];
        }

        

        $nome = $_POST['nome'];
        $valor_carteira = $_POST['valor_carteira'];
        $quantidade = $_POST['quantidade'];


        
        //Busca valores
        $allDados = Info_ativo::all();

        $allDadosInfo = [];
        foreach($allDados as $v) {
            array_push($allDadosInfo,$v);
        }

        $ret = [];

        foreach($allDadosInfo as $adi) 
        {
            if(in_array($adi->symbol,$valor))
            {
                array_push($ret, $adi);
            }
        }

        $valores_calculados = [];
        foreach($ret as $r) {
        
            $p_symbol = $porcentagens[$r['symbol']];

            $vcp = $valor_carteira*$p_symbol;
            $symbol = $r['symbol'];

            $valores_calculados[$symbol] = ($vcp)/100;
        }

        Carteira::create(['id_usuario'=>Auth::id(),'nome'=>$nome, 'valor'=>$valor_carteira]);
        $id_carteira = Carteira::orderBy('created_at', 'desc')->get('id')->first();

        foreach($ret as $r) {
            Acao_carteira::create([
            'id_usuario'=>Auth::id(), 
            'id_carteira'=>$id_carteira->id, 
            'ativo'=>$r['symbol'],
            'valor'=>$valores_calculados[$r['symbol']], 
            'porcentagem_objetivo'=>$porcentagens[$r['symbol']], 
            'preco_acao'=>$r['price'],
            'quantidade'=>$quantidade,
            'setor'=>$r['description']
            ]);
        }
        return redirect('/dashboard');
    }


    public function listar() {

        $dadosCarteiras = Carteira::all()->where('id_usuario', '=', Auth::id());
        $dadosAcoesCarteira = Acao_carteira::all()->where('id_usuario', '=', Auth::id());

        $carteiras = [];
        foreach($dadosCarteiras as $dc) {
           $carteiras[] = $dc;
        }

        $Acoes_carteiras = [];
        foreach($dadosAcoesCarteira as $ac) {
            $acoesCarteiras[] = $ac;
        }

        return view('pages.carteira-listar', compact('carteiras', 'dadosCarteiras'));
    }

    public function json(Request $request) {
        // dd($request->all());
    }

}
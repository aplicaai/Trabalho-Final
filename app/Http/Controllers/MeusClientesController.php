<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MeusClientesController extends Controller
{
    public function listar()
    {
        $clientes = User::all()->where('analista', Auth::user()->name);

        return view('pages.meus_clientes', compact('clientes'));
    }

    public function verCarteiras()
    {
        // $dadosAcao_carteiras = Acao_carteira::all()->where('id_carteira', '=', $id_carteira);
        // $dadosCarteira = Carteira::where('id','=',$id_carteira)->get('nome');

        // $acao_carteiras = [];
        // foreach($dadosAcao_carteiras as $ac) 
        // {
        //     $acao_carteiras[] = $ac;
        // }

        // $valorTotal = 0;
        // $patrimonioAtualizado = [];
        // $participacaoAtual = [];

        // foreach($acao_carteiras as $ac) 
        // {
        //     $valorTotal = $valorTotal + $ac->preco_acao*$ac->quantidade;   
        // }

        // foreach($acao_carteiras as $ac)
        // {
        //     $ac['patrimonioAtualizado'] = $ac->quantidade*$ac->preco_acao;
        //     if($ac['patrimonioAtualizado']!=0) 
        //     {
        //         $ac['participacaoAtual'] = round(($ac['patrimonioAtualizado']*100)/$valorTotal,2);
        //     }
        //     else
        //     {
        //         $ac['participacaoAtual'] = 0;
        //     }
        // }

        return view('pages.ver_carteiras');
    }
}

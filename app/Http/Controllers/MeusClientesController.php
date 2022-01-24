<?php

namespace App\Http\Controllers;

use App\model\Carteira;
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

    public function verCarteiras($id)
    {
        $carteiras = Carteira::all()->where('id_usuario', $id);

        return view('pages.ver_carteiras', compact('carteiras'));
    }
}

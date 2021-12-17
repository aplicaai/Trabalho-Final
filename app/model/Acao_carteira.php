<?php

namespace App\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acao_carteira extends Model
{
    use HasFactory;
    protected $table = "acao_carteiras";
    public $timestamps = true;

    protected $fillable = ['id_usuario', 'id_carteira','ativo','valor','porcentagem_objetivo',
    'preco_acao','quantidade','setor','created_at', 'updated_at','deleted_at'];
}

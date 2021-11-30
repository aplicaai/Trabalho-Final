<?php

namespace App\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carteira extends Model
{
    use HasFactory;
    protected $table = "Carteiras";
    public $timestamps = true;

    protected $fillable = ['id_usuario','acao','preco_acao','created_at', 'updated_at','deleted_at'];

}

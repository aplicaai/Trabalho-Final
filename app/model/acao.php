<?php

namespace App\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class acao extends Model
{
    use HasFactory;

    protected $table = "acaos";
    public $timestamps = true;
    // protected $cascadeDeletes  = ['veiculos'];
	
    protected $fillable = ['acao', 'nome', 'razao', 
                            'created_at', 'updated_at','deleted_at'];
}

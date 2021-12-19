<?php

namespace App\model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info_ativo extends Model
{
    use HasFactory;
    protected $table = "info_ativos";
    public $timestamps = true;

    protected $fillable = ['symbol','name','company_name',
    'description','price','updated_at','deleted_at'];

}

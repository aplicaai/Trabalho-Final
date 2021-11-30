<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcaoCarteirasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acao_carteiras', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario');
            $table->string('acao');
            $table->float('valor');
            $table->float('porcentagem');
            $table->float('preco_acao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acao_carteiras');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Change2AcaoCarteiras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('acao_carteiras', function (Blueprint $table) {
            $table->integer('quantidade')->nullable();
            $table->string('setor')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('acao_carteiras', function (Blueprint $table) {
            $table->dropColumn('quantidade');
            $table->dropColumn('setor');
        });
    }
}

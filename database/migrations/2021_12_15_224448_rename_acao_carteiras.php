<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameAcaoCarteiras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('acao_carteiras', function (Blueprint $table) {
            $table->renameColumn('acao', 'ativo');
            $table->renameColumn('porcentagem', 'porcentagem_objetivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('acao_carteiras', function (Blueprint $table) {
        //     $table->dropColumn('acao', 'ativo');
        //     $table->dropColumn('porcentagem', 'porcentagem_objetivo');
        // });
    }
}

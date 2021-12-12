<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

    if(!Schema::hasTable('acaos')) {

        Schema::create('acaos', function (Blueprint $table) {
            $table->id();
            $table->string('acao')->nullable();
            $table->string('nome')->nullable();
            $table->string('razao')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acaos');
    }
}

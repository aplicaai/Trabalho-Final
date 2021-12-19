<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeInfoAtivos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('info_ativos', function (Blueprint $table) { 
            $table->string('symbol')->nullable();
            $table->string('name')->nullable();
            $table->string('company_name')->nullable();
            $table->string('description')->nullable();
            $table->string('price')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('info_ativos', function (Blueprint $table) {
            $table->dropColumn('symbol');
            $table->dropColumn('name');
            $table->dropColumn('company_name');
            $table->dropColumn('description');
            $table->dropColumn('price');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaCursolog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursolog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome_curso', 60);
            $table->date('data_cadastro');
            $table->string('carga_horaria',60);
            $table->string('usuario_logado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursolog');
    }
}

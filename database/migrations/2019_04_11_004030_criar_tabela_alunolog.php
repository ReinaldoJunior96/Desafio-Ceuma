<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaAlunolog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunolog', function (Blueprint $table) {
            $table->increments('id');
            $table->string('usuario_logado', 50);
            $table->date('data');
            $table->text('operacao_realizada');
            $table->string('operacao', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunolog');
    }
}

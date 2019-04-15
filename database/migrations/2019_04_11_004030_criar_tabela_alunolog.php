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
            $table->string('usuario_logado', 20);
            $table->date('data'); //mudar para timestamp ~ pré-defenido como current tbm
            $table->text('operacao_realizada');
            $table->string('operacao', 5); //char
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

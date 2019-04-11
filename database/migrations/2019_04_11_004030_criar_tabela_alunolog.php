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
            $table->bigIncrements('id');
            $table->string('nome_aluno', 60);
            $table->integer('CPF')->unique();
            $table->text('endereco');
            $table->integer('CEP')->unique();
            $table->string('email',50)->unique();
            $table->string('telefone');
            $table->integer('curso_id'); // Faz referênccia ao curso dele
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
        Schema::dropIfExists('alunolog');
    }
}

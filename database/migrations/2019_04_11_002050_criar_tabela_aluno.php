<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaAluno extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno', function (Blueprint $table) {
            $table->increments('id'); // codigo do aluno
            $table->string('nome_aluno', 100);
            $table->integer('CPF')->unique();
            $table->text('endereco');
            $table->integer('CEP', 8)->unique();
            $table->string('email',50)->unique();
            $table->string('telefone', 50);
            $table->integer('curso_id'); // Fazer um alter table para referenciar a foreign no id curso!!
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aluno');
    }
}

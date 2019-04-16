<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'nome_curso', 'data_cadastro', 'carga_horaria',
    ];

    protected $table = 'curso';


    public function Alunos()
    {
        return $this->hasMany(Aluno::class, 'curso_id');
    }
}

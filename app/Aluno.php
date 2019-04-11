<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable =[
    'nome_aluno','CPF','endereco','CEP','email','telefone','curso_id'
    ];

    protected $table = 'aluno';

    public function Curso(){
        return $this->belongsTo(Curso::class,'id');
    }
}

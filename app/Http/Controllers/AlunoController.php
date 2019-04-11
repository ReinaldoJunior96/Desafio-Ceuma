<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Aluno;

class AlunoController extends Controller
{
    public function index(){
        $all_alunos = DB::table('aluno')->select()->get();
        return $all_alunos;
    }

    public function store(Request $request){
        try {
            $query = DB::table('aluno')->insert([
                'nome_aluno' => $request->nome_aluno,
                'CPF' => $request->CPF,
                'endereco' =>$request->endereco,
                'CEP'=>$request->CEP,
                'email'=>$request->email,
                'telefone'=>$request->telefone,
                'curso_id'=>$request->curso_id
            ]);
            if($query){
                return Self::index();
            }else{
                return response()->json(['Status'=>'falha']);
            }
        } catch (QueryException $e) {
            return response()->json(['status'=>'Erro ao tentar executar query']);
        }


    }

    public function update(Request $request, $parameter ){
        $query = DB::table('aluno')
            ->where('id', '=',$parameter)
            ->update([
                'nome_aluno' => $request->nome_aluno,
                'CPF' => $request->CPF,
                'endereco' =>$request->endereco,
                'CEP'=>$request->CEP,
                'email'=>$request->email,
                'telefone'=>$request->telefone,
                'curso_id'=>$request->curso_id
            ]);
        if($query){
            return Self::index();
        }else{
            return response()->json(['Status'=>'falha']);
        }
    }

    public function destroy(Request $request , $parameter){
        $query = DB::table('aluno')->where('id', '=', $parameter)->delete();
        if ($query){
            return Self::index();
        }else {
            return response()->json(['Status' => 'falha']);
        }
    }
}

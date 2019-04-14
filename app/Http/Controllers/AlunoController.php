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
    public function show($parameter){
        $aluno = DB::table('aluno')->select()->where('id','=',$parameter)->get();
        return $aluno;
    }
    public function store(Request $request){
        try {
            $verifica_permissao = DB::table('usuario')
            ->select()
            ->where('usuario','=',$request->usuario)
            ->where('modulo','=',$request->modulo)
            ->where('operacao','LIKE','%I%')
            ->count();
            if ($verifica_permissao == 1) {
                $query = DB::table('aluno')->insert([
                    'nome_aluno' => $request->nome_aluno,
                    'CPF' => $request->CPF,
                    'endereco' =>$request->endereco,
                    'CEP'=>$request->CEP,
                    'email'=>$request->email,
                    'telefone'=>$request->telefone,
                    'curso_id'=>$request->curso_id
                ]);
                $querylogtext = "DB::table('aluno')->insert([
                    'nome_aluno' => $request->nome_aluno,
                    'CPF' => $request->CPF,
                    'endereco' =>$request->endereco,
                    'CEP'=>$request->CEP,
                    'email'=>$request->email,
                    'telefone'=>$request->telefone,
                    'curso_id'=>$request->curso_id
                ])";
                $querylog = DB::table('alunolog')->insert([
                    'usuario_logado' => $request->usuario,
                    'operacao_realizada'=> $querylogtext,
                    'operacao' => 'I'
                ]);
                return $verifica_permissao;
            }
        } catch (QueryException $e) {
            return response()->json(['status'=>'Erro ao tentar executar query']);
        }
    }

    public function update(Request $request, $parameter ){
        $verifica_permissao = DB::table('usuario')
        ->select()
        ->where('usuario','=',$request->usuario)
        ->where('modulo','=',$request->modulo)
        ->where('operacao','LIKE','%A%')
        ->count();
        if ($verifica_permissao == 1) {
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
            $querylogtext = "DB::table('aluno')
                ->where('id', '=',$parameter)
                ->update([
                    'nome_aluno' => $request->nome_aluno,
                    'CPF' => $request->CPF,
                    'endereco' =>$request->endereco,
                    'CEP'=>$request->CEP,
                    'email'=>$request->email,
                    'telefone'=>$request->telefone,
                    'curso_id'=>$request->curso_id
                ]);";
            $querylog = DB::table('alunolog')->insert([
                    'usuario_logado' => $request->usuario,
                    'operacao_realizada'=> $querylogtext,
                    'operacao' => 'A'
                ]);
            return $verifica_permissao;
        }
    }
    public function destroy(Request $request , $parameter){
        $verifica_permissao = DB::table('usuario')
        ->select()
        ->where('usuario','=',$request->usuario)
        ->where('modulo','=',$request->modulo)
        ->where('operacao','LIKE','%E%')
        ->count();
        if ($verifica_permissao == 1) {
            $query = DB::table('aluno')->where('id', '=', $parameter)->delete();
            $querylogtext = "DB::table('aluno')->where('id', '=', $parameter)->delete();";
            $querylog = DB::table('alunolog')->insert([
                    'usuario_logado' => $request->usuario,
                    'operacao_realizada'=> $querylogtext,
                    'operacao' => 'E'
            ]);
            return $verifica_permissao;
        }
    }

    public function alunosjoincursos(){
        $query = DB::table('aluno')
            ->join('curso', 'aluno.curso_id', '=', 'curso.id')
            ->select()
            ->get();          
        return $query;
    }
}

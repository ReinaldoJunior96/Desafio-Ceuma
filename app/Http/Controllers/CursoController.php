<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Curso;

class CursoController extends Controller
{
    public function index()
    {
        $all_cursos = DB::table('curso')->select()->get();
        return $all_cursos;
    }

    public function show($parameter)
    {
        try {
            $curso = DB::table('curso')->select()->where('id', '=', $parameter)->get();
            return $curso;
        } catch (QueryException $e) {
            return response()->json(['status' => 'Erro'], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $verifica_permissao = DB::table('usuario')
                ->select()
                ->where('usuario', '=', $request->usuario)
                ->where('modulo', '=', $request->modulo)
                ->where('operacao', 'LIKE', '%I%')
                ->count();
            if ($verifica_permissao == 1) {
                $query = DB::table('curso')->insert([
                    'nome_curso' => $request->nome_curso,
                    'data_cadastro' => $request->data_cadastro,
                    'carga_horaria' => $request->carga_horaria
                ]);
                $querylogtext = "DB::table('curso')->insert([
                'nome_curso' => $request->nome_curso,
                'data_cadastro' => $request->data_cadastro,
                'carga_horaria' =>$request->carga_horaria
                ]);";
                $querylog = DB::table('cursolog')->insert([
                    'usuario_logado' => $request->usuario,
                    'operacao_realizada' => $querylogtext,
                    'operacao' => 'I'
                ]);
                return $verifica_permissao;
            }
        } catch (QueryException $e) {
            return response()->json(['status' => 'Erro']);
        }

    }

    public function update(Request $request, $parameter)
    {
        try {
            $verifica_permissao = DB::table('usuario')
                ->select()
                ->where('usuario', '=', $request->usuario)
                ->where('modulo', '=', $request->modulo)
                ->where('operacao', 'LIKE', '%A%')
                ->count();

            if ($verifica_permissao == 1) {
                $query = DB::table('curso')
                    ->where('id', '=', $parameter)
                    ->update([
                        'nome_curso' => $request->nome_curso,
                        'data_cadastro' => $request->data_cadastro,
                        'carga_horaria' => $request->carga_horaria
                    ]);
                $querylogtext = "DB::table('curso')
                    ->where('id', '=',$parameter)
                    ->update([
                        'nome_curso' => $request->nome_curso,
                        'data_cadastro' =>$request->data_cadastro,
                        'carga_horaria' => $request->carga_horaria
                    ]);";
                $querylog = DB::table('cursolog')->insert([
                    'usuario_logado' => $request->usuario,
                    'operacao_realizada' => $querylogtext,
                    'operacao' => 'A'
                ]);
                return $verifica_permissao;
            }
        } catch (QueryException $e) {
            return response()->json(['status' => 'Erro']);
        }

    }

    public function destroy(Request $request, $parameter)
    {
        try {
            $verifica_permissao = DB::table('usuario')
                ->select()
                ->where('usuario', '=', $request->usuario)
                ->where('modulo', '=', $request->modulo)
                ->where('operacao', 'LIKE', '%E%')
                ->count();
            if ($verifica_permissao == 1) {
                $query = DB::table('curso')->where('id', '=', $parameter)->delete();
                $querylogtext = "DB::table('curso')->where('id', '=', $parameter)->delete();";
                $querylog = DB::table('cursolog')->insert([
                    'usuario_logado' => $request->usuario,
                    'operacao_realizada' => $querylogtext,
                    'operacao' => 'E'
                ]);
                return $verifica_permissao;
            }
        } catch (QueryException $e) {
            return response()->json(['status' => 'Erro']);
        }

    }

    public function AlunosPorCurso(Request $request, $parameter)
    {
        return Curso::find($parameter)->Alunos;
    }
}

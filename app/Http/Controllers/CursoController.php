<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Curso;

class CursoController extends Controller
{
    public function index(){
        $all_cursos = DB::table('curso')->select()->get();
        return $all_cursos;
    }

    public function store(Request $request){
        $query = DB::table('curso')->insert([
            'nome_curso' => $request->nome_curso,
            'data_cadastro' => $request->data_cadastro,
            'carga_horaria' =>$request->carga_horaria
        ]);
        if($query){
            return Self::index();
        }else{
            return response()->json(['Status'=>'falha']);
        }
    }

    public function update(Request $request, $parameter ){
        $query = DB::table('curso')
            ->where('id', '=',$parameter)
            ->update([
                'nome_curso' => $request->nome_curso,
                'data_cadastro' =>$request->data_cadastro,
                'carga_horaria' => $request->carga_horaria
            ]);
        if($query){
            return Self::index();
        }else{
            return response()->json(['Status'=>'falha']);
        }
    }

    public function destroy(Request $request , $parameter){
        $query = DB::table('curso')->where('id', '=', $parameter)->delete();
        if ($query){
            return Self::index();
        }else {
            return response()->json(['Status' => 'falha']);
        }
    }
}

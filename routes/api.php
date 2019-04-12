<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/curso/alunos/{parameter}','CursoController@AlunosPorCurso');
//Route::post('/login/{user}/{senha}','UsuarioController@login');
Route::resource('curso', 'CursoController');
Route::resource('aluno', 'AlunoController');

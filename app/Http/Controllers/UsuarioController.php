<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Usuario;

class UsuarioController extends Controller
{
    public function login(Request $request, $user,$senha){
    	$session = DB::table('usuario')->select()->where('usuario','=',$user)->where('senha','=',$senha)->get();
    	if ($session->count() == 1) {
    		session_start();
    		json_decode($session);
    		foreach ($session as $sessao_unica) {
    			$_SESSION['code_user'] = $sessao_unica->id;
    		}
            echo "111111";
    		//return response()->json(['stauts'=>'sessao criada']);    		
    	}
    	
    }
    public function destroysession(){

    }
}

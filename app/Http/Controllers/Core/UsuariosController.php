<?php
namespace App\Http\Controllers\Core;
use App\Http\Controllers\Controller;
use App\Http\Repository\UsuarioRepository;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

Class UsuariosController extends Controller{
    private $_usuario;
    public function __construct(UsuarioRepository $u){
        $this->_usuario = $u;
    }

    public function crearUsuario(LoginRequest $request){
        return $this->_usuario->CrearUsuario($request);
       // return response()->json($this->_maps->obtenerRutas());
    }

    public function login(Request $request){
       $token =  $this->_usuario->login($request);
       if($token != null){
           return response()->json($token);
       }

       return response()->json($token,400);
       // return response()->json($this->_maps->obtenerRutas());
    }

    
}
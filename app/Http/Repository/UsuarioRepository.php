<?php 
namespace App\Http\Repository;
use App\User;
use Mail;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\JWTException;
Class UsuarioRepository {
    private $_usuario;

    public function __construct(){
       $this->_usuario = new User();
    }


    public function CrearUsuario($request)
    {
        try{
            //CREAR usuario
            $usuario = new User;
            $usuario->email = $request->get('email');
            $usuario->password = bcrypt($request->get('password'));
            $usuario->save();
            $id = $usuario->id;
            $usuario->password = $request->get('password');
            $usuario->enviarEmail();
            return $id;

        }catch(\Exception $e){
            \DB::rollback();
            return -1;
        }
    }

    public function login($request){
        $token = null;
        $usuario = $this->_usuario->where('email',$request->get('email'))->first();
        if($usuario){
            if(\Hash::check($request->get('password'),$usuario->password)){
               $token = JWTAuth::fromUser($usuario);
            }
        }

        return $token;
    }

}
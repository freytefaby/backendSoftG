<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Mail;
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "usuarios";
    public $timestamps = false;
    protected $fillable = [
         'email', 'password',
    ];
    public function getJWTIdentifier(){
        return $this->getKey();
    }
    public function getJWTCustomClaims(){
        return [];
    }

    public function enviarEmail(){
        $encabezado = "Has sido ingresado a la plataforma correctamente!!";
        $email = $this->email;
        $password = $this->password;
        try{
            \Mail::send('correo.send',["usuario"=>$email,"password"=>$password], function($msj) use($encabezado,$email){
                $msj->subject($encabezado);
                $msj->to($email);
             });
           
        }catch(\Swift_TransportException $e){
            
            
        }
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

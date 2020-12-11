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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware'=>['jwt.auth']],function(){
    Route::group(['prefix'=>'maps'],function(){
        Route::get('/','Core\MapsController@cargarRutas');
        Route::get('/detalle/{id}','Core\MapsController@cargardetalleruta');
        Route::post('/crearRuta','Core\MapsController@crearRuta');
    });

    Route::group(['prefix'=>'excel'],function(){
        Route::post('/cargar','Core\MapsController@cargarExcel');
    });


    Route::get('/descargarDatos','Core\MapsController@descargarDatos');
});

Route::group(['prefix'=>'usuarios'],function(){
    Route::post('/crear','Core\UsuariosController@crearUsuario');
    Route::post('/login','Core\UsuariosController@login');
});









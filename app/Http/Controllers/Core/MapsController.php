<?php
namespace App\Http\Controllers\Core;
use App\Http\Controllers\Controller;
use App\Http\Repository\MapsRepository;
use App\Http\Requests\RutaRequest;
use Illuminate\Http\Request;

Class MapsController extends Controller{
    private $_maps;
    public function __construct(MapsRepository $maps){
        $this->_maps = $maps;
    }

    public function cargarRutas(){
        return response()->json($this->_maps->obtenerRutas());
    }

    public function cargardetalleruta($id){
        return response()->json($this->_maps->cargardetalleruta($id));
    }

    public function crearRuta(RutaRequest $request){
        $respuesta = $this->_maps->CrearRuta($request);
        if($respuesta != -1){
            return response()->json($respuesta);
        }
        return response()->json("No se pudo crear la ruta",500);
    }

    public function cargarExcel(Request $request){
      $exceldata = $this->_maps->cargarExcel($request);
      return response()->json($exceldata);
        
       
    }

    public function descargarDatos(){
        $detalle = $this->_maps->cargarDetalleRutaAll();
        $rutas = $this->_maps->obtenerRutas();
        return response()->json(["detalle"=>$detalle,"rutas"=>$rutas]);
    }
}
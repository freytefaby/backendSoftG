<?php 
namespace App\Http\Repository;
use App\Models\Ruta;
use App\Models\DetalleRuta;
Class MapsRepository {
    private $_mapsRepo;

    public function __construct(){
       $this->_mapsRepo = new Ruta();
       $this->_mapsDetalleRepo = new DetalleRuta();
    }

    public function obtenerRutas(){
        $rutas = $this->_mapsRepo
                      ->select('*')
                      ->get();
        return $rutas;
    }

    public function cargardetalleruta($idruta){
        $rutas = $this->_mapsDetalleRepo
                      ->select('*')
                      ->where('idruta',$idruta)
                      ->get();

        return $rutas;
        // return $rutas;
    }

    public function CrearRuta($ruta)
    {
        \DB::beginTransaction();
        try{
            //CREAR LA RUTA
            $model = new Ruta;
            $model->descripcion = $ruta->get('nombre');
            $model->save();
            $id = $model->id;

            
            //CREAR DESCRIPCION DE RUTAS
            $puntos = $ruta->get('puntos');
            foreach($puntos as $item){
                $detalle = new DetalleRuta;
                $detalle->title = $item["title"];
                $detalle->ltn = $item["ltn"];
                $detalle->lng = $item["lng"];
                $detalle->codigo = $item["codigo"];
                $detalle->idruta = $id;
                $detalle->save();
            }
            \DB::commit();
            return $id ;

        }catch(\Exception $e){
            \DB::rollback();
            return -1;
        }
    }

    public function cargarExcel(){
        $path = base_path().'/public/DriverFull.xlsx';
        $reader =  \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
        $spreadsheet = $reader->load($path);
        $extract = [];
        $sheet = $spreadsheet->getActiveSheet();

        //$horaini = \Carbon\Carbon::parse("14:30")->diff("06:25")->format('%H:%i:%s');
        $carbon = new \Carbon\carbon;
        foreach($sheet->getRowIterator(2) as $row){
            $nombres = $sheet->getCellByColumnAndRow(2,$row->getRowIndex());
            $apellidos = $sheet->getCellByColumnAndRow(3,$row->getRowIndex());
            $fecha = $sheet->getCellByColumnAndRow(4,$row->getRowIndex());
            $horaini = $sheet->getCellByColumnAndRow(5,$row->getRowIndex());
            $horafin = $sheet->getCellByColumnAndRow(6,$row->getRowIndex());
            $diferencia = $carbon::parse($horafin->getvalue())->diff($horaini->getvalue())->format('%H:%I:%S');

            //extraer diferencia horaria 
            
            array_push($extract,["nombres"=>$nombres->getvalue(),
                                 "apellidos"=>$apellidos->getvalue(),
                                 "fecha"=>$fecha->getCalculatedValue(),
                                 "horaini"=>$horaini->getvalue(),
                                 "horafin"=>$horafin->getvalue(),
                                 "diferencia"=>$diferencia]);
            
        }
        return $extract;
    }

    public function cargarDetalleRutaAll(){
        $rutas = $this->_mapsDetalleRepo
                      ->select('*')
                      ->get();

        return $rutas;
        // return $rutas;
    }
}
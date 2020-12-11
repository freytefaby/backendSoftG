<?php 
namespace App\Http\Repository;
use App\Models\Ruta;
use App\Models\DetalleRuta;
use App\Models\UsuariosExcel;
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

    public function cargarExcel($request){
        $file = base64_decode($request->get('content'));
        $result = \Storage::disk('local')->put("example.xlsx",$file);
        if($result){
            $path = base_path().'/storage/app/example.xlsx';
            $reader =  \PhpOffice\PhpSpreadsheet\IOFactory::createReader("Xlsx");
            $spreadsheet = $reader->load($path);
            $sheet = $spreadsheet->getActiveSheet();
            $carbon = new \Carbon\carbon;
            //ELIMINAMOS LOS USUARIOS QUE ESTEN ACTUALMENTE EN LA TABLA DE USUARIOS DE EXCEL
            \DB::table("usuariosexcel")->truncate();
            foreach($sheet->getRowIterator(2) as $row){
                $nombres = $sheet->getCellByColumnAndRow(2,$row->getRowIndex());
                $apellidos = $sheet->getCellByColumnAndRow(3,$row->getRowIndex());
                $fecha = $sheet->getCellByColumnAndRow(4,$row->getRowIndex());
                $horaini = $sheet->getCellByColumnAndRow(5,$row->getRowIndex());
                $horafin = $sheet->getCellByColumnAndRow(6,$row->getRowIndex());
                $diferencia = $carbon::parse($horafin->getvalue())->diff($horaini->getvalue())->format('%H:%I:%S');
                $driver_id = $sheet->getCellByColumnAndRow(1,$row->getRowIndex());
                //Insertar usuarios
                $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($fecha->getvalue());
                $usuarios = new UsuariosExcel();
                $usuarios->driver_id = $driver_id;
                $usuarios->last_name = $apellidos;
                $usuarios->first_name = $nombres;
                $usuarios->actual_check_in = $horaini;
                $usuarios->actual_drop_off = $horafin;
                $usuarios->difftime = $diferencia;
                $usuarios->fecha = $date;
                $usuarios->save();
                // array_push($extract,["nombres"=>$nombres->getvalue(),
                //                      "apellidos"=>$apellidos->getvalue(),
                //                      "fecha"=>$fecha->getCalculatedValue(),
                //                      "horaini"=>$horaini->getvalue(),
                //                      "horafin"=>$horafin->getvalue(),
                //                      "diferencia"=>$diferencia]);
                
            }
            \Storage::disk('local')->delete("example.xlsx");
            $query = "SELECT * FROM usuariosexcel";
            $usuariosExcel = \DB::select($query);
            return $usuariosExcel;
        }

        return [];



       
    }

    public function cargarDetalleRutaAll(){
        $rutas = $this->_mapsDetalleRepo
                      ->select('*')
                      ->get();

        return $rutas;
        // return $rutas;
    }
}
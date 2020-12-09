<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class DetalleRuta extends Model {
    protected $table = "detalle_ruta";
    public $timestamps = false;
    protected $fillable=['title','ltn','lng','idruta','codigo'];
}


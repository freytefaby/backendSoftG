<?php 

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class UsuariosExcel extends Model {
    protected $table = "usuariosExcel";
    public $timestamps = false;
    protected $fillable=['driver_id','last_name','first_name','actual_check_in','actual_drop_off','difftime','fecha'];
}


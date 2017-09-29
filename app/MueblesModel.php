<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; /*Si no mal recuerdo esta linea es para poder guardar los archivos*/

class MueblesModel extends Model
{
    protected $table = "muebles_models";
    protected $fillable = ["path"];

    /*Agregamos un mutador... un mutador sirve para modificar algunos elementos antes de ser guardados*/
    public function setPathAttribute($path) {
        /*Debemos validar que el campo de archivo no esté vacío*/
        if( !empty($path) ) {   
        	/*Guardamos el nombre en una variable*/
        	/*Generamos un string de 10 caracteres, concatenamos la hora, y le concatenamos el nombre
        	del archivo que está subiendo el usuario*/
            $name = str_random(10)."-".Carbon::now()."_".$path->getClientOriginalName();

        	$this->attributes["path"] = $name;

        	/* Procedemos ahora a lo que es la subida del archivo  */
        	\Storage::disk('local')->put( $name, \File::get($path) );
        }
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MueblesModel extends Model
{
    protected $table = "muebles_models";
    protected $fillable = ["path0","path1"];
}

<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    protected $fillable = ['id', 'nombre', 'cod_interno', 'desarrollador_principal'];


    public function subproyectos(){

     $this->hasMany('App\Subproyectos');

    }

}

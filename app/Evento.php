<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
  protected $table = 'evento';
  
  protected $fillable = [ 'nombre', 'descripcion', 'capacidad', 'fecha_inicio',
                          'fecha_fin', 'estatus'
  ];


}

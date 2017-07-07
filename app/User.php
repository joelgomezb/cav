<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'nacionalidad', 'documento_identidad', 'email', 'password', 'is_activated', 'fecha_nacimiento',
        'genero', 'telefono', 'celular', 'grado_instruccion', 'cargo', 'cod_empresa', 'contacto_facturacion', 'rif', 'codigo_telefono',
        'correo_contacto', 'telefono_contacto', 'estatus'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

  /*  public function empresa()
   {
       return $this->hasOne('App\Empresa');
   }*/
}

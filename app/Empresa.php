<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';

    protected $fillable = [
        'cod_empresa', 'nombre', 'tipo' ];


    protected $hidden = [
            'id' ];    
}

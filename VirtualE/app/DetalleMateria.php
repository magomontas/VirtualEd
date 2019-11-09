<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleMateria extends Model
{
    protected $table='detalle_materia';

    protected $primaryKey="iddetalle_materia";

    public $timestamps=false;

    protected $fillable =[
        'idusuario',
        'idmateria',
        'idclase'
    ];

    protected $guarded =[

    ];
}

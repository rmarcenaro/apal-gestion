<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'alumno';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_modificacion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'grupo_id', 'nombres', 'apellidos', 'estado_id',
    ];

    /**
     * Obtiene Grupo vinculado al Alumno.
     */
    public function grupo()
    {
        return $this->belongsTo('App\Grupo');
    }

    /**
     * Obtiene Aportes vinculados al Alumno.
     */
    public function aportes()
    {
        return $this->hasMany('App\Aporte');
    }
}

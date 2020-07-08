<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'grupo';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_modificacion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'grado_id', 'descripcion', 'estado_id',
    ];

    /**
     * Obtiene Grado vinculado al Grupo.
     */
    public function grado()
    {
        return $this->belongsTo('App\Grado');
    }

    /**
     * Obtiene Alumnos vinculados al Grupo.
     */
    public function alumnos()
    {
        return $this->hasMany('App\Alumno');
    }
}

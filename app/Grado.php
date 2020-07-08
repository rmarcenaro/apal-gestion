<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'grado';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_modificacion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'institucion_id', 'descripcion', 'estado_id',
    ];

    /**
     * Obtiene la Institucion vinculada al Usuario.
     */
    public function institucion()
    {
        return $this->belongsTo('App\Institucion');
    }

    /**
     * Obtiene Grupos vinculados al Grado.
     */
    public function grupos()
    {
        return $this->hasMany('App\Grupo');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'institucion';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_modificacion';

    public const ESTADO_INHABILITADO = "INHABILITADA";
    public const ESTADO_HABILITADO = "HABILITADA";

    public const ESTADOS = [
        self::ESTADO_INHABILITADO => 0,
        self::ESTADO_HABILITADO => 1
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'estado_id',
    ];

    /**
     * Obtiene Usuarios vinculados a la Institucion.
     */
    public function usuarios()
    {
        return $this->hasMany('App\User');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AporteOrigen extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'auxiliar_aporte_origen';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_modificacion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'institucion_id', 'descripcion', 'estado_id', 'predeterminado',
    ];

    /**
     * Obtiene Institucion vinculada al Origen de aporte.
     */
    public function institucion()
    {
        return $this->belongsTo('App\Institucion');
    }

}

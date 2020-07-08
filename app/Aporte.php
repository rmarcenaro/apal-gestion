<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aporte extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'aporte';

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_modificacion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'alumno_id', 'origen_id', 'moneda_id', 'importe', 'nota', 'estado_id',
    ];

    /**
     * Obtiene Alumno vinculado al Aporte.
     */
    public function alumno()
    {
        return $this->belongsTo('App\Alumno');
    }

    /**
     * Obtiene Origen vinculado al Aporte.
     */
    public function origen()
    {
        return $this->belongsTo('App\AporteOrigen');
    }

}

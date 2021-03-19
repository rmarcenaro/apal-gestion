<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class InstitucionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);

        // Si necesitamos meter datos extra en el Array de la coleccion devuelto
        // return [
        //     'data' => $this->collection,
        //     'links' => [
        //         'self' => 'link-value',
        //     ],
        // ];
    }
}

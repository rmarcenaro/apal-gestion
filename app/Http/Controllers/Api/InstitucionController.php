<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Log;
use App\Institucion;
use Illuminate\Http\Response;
use App\Http\Requests\InstitucionEditRequest;
use App\Http\Resources\InstitucionResource;
use App\Http\Resources\InstitucionCollection;

class InstitucionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //return InstitucionResource::collection(Institucion::all());
        return new InstitucionCollection(Institucion::all());
        //return new InstitucionCollection(Institucion::all()->keyBy->id); // para que la clave en el Array sea un campo

        //return new InstitucionCollection(Institucion::paginate());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\InstitucionEditRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstitucionEditRequest $request)
    {

        $institucion = Institucion::create($request->all());

        Log::info("Institución registrada: " . $institucion->toJson());

        return (new InstitucionResource($institucion))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new InstitucionResource(Institucion::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\InstitucionEditRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InstitucionEditRequest $request, $id)
    {
        $institucion = Institucion::findOrFail($id);
        $institucion->nombre = $request['nombre'];
        $institucion->estado_id = (isset($request['estado_id'])) ? $request['estado_id'] : 0;
        $institucion->save();

        Log::info("Institución actualizada: " . $institucion->toJson());

        return (new InstitucionResource($institucion))
            ->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institucion $institucion)
    {
        $institucion->delete();

        Log::info("Institucion eliminada: " . json_encode($institucion));

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

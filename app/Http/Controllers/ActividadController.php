<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividades = Actividad::all();
        return response(json_encode([
            "data" => $actividades
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actividad = new Actividad();
        $actividad -> descripcion = $request -> input('descripcion');
        $actividad -> nota = $request -> input('nota');
        $actividad -> codigoEstudiante = $request -> input('codigoEstudiante');
        $actividad -> save();
        return response(json_encode([
            "data" => "Actividad registrada"
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actividad = Actividad::find($id);
        return response(json_encode([
            "data" => $actividad
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $actividad = Actividad::find($id);
        $actividad -> descripcion = $request -> input('descripcion');
        $actividad -> nota = $request -> input('nota');
        $actividad -> codigoEstudiante = $request -> input('codigoEstudiante');
        $actividad -> save();
        return response(json_encode([
            "data" => "Actividad actualizada"
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actividad = Actividad::find($id);
        if (empty($actividad)){
            return response(json_encode([
                "data" => "La actividad no existe"
            ]), 404);
        }
        $actividad -> delete();
        return response(json_encode([
            "data" => "Actividad eliminada"
        ]));
    }
}
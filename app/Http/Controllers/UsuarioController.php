<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return response(json_encode([
            "data" => $usuarios
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
        $usuario = new Usuario();
        $usuario -> name = $request -> input('name');
        $usuario -> username = $request -> input('username');
        $usuario -> password = $request -> input('password');
        $usuario -> save();
        return response(json_encode([
            "data" => "Usuario registrado"
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
        $usuario = Usuario::find($id);
        return response(json_encode([
            "data" => $usuario
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
        $usuario = Usuario::find($id);
        $usuario -> name = $request -> input('name');
        $usuario -> username = $request -> input('username');
        $usuario -> password = $request -> input('password');
        $usuario -> save();
        return response(json_encode([
            "data" => "Registro actualizado"
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
        $usuario = Usuario::find($id);
        if (empty($usuario)){
            return response(json_encode([
                "data" => "El ususario no existe"
            ]), 404);
        }
        $usuario -> delete();
        return response(json_encode([
            "data" => "Registro eliminado"
        ]));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consignacion;
use App\Http\Controllers\AveriguacionController;


class ConsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Consignacion::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Averiguacion = new AveriguacionController;
        $Averiguacion = $Averiguacion->store($request->Av_Previa);
        // foreach ($request->Personas as $Persona) {
        //     echo "Datos de la persona: {$Persona['Nombre']} ";
        // }
        return $Averiguacion['ID_Averiguacion'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Mostrando una consignacion por ID";
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
        return "Actualizando una consignación por ID";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "Eliminando una consignación por ID";
    }
}
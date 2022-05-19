<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consignacion;
use App\Http\Controllers\AveriguacionController;
use Carbon\Carbon;


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

        //Se obtiene la informacion de la averiguacion insertada
        $Averiguacion = $Averiguacion->store($request->Av_Previa);
        Consignacion::create([
            'Fecha' => $request->Fecha,
            'ID_Agencia' => $request->Agencia,
            'Fojas' => $request->Fojas, 
            'ID_Averiguacion' => $Averiguacion['ID_Averiguacion'], 
            'Detenido' => $request->Detenido,
            'ID_Juzgado' => $request->Juzgado,
            'ID_Reclusorio' => $request->Reclusorio,
            'Hora_Recibo' => $request->Hora_Recibo,
            'Hora_Entrega' => $request->Hora_Entrega,
            'Hora_Salida' => $request->Hora_Salida,
            'Hora_Regreso' => $request->Hora_Regreso,
            'Hora_Llegada' => $request->Hora_Llegada,
            'Fecha_Entrega' => $request->Fecha_Entrega,
            'Nota' => $request->Nota,
           ]);

        //Se obtiene la informacion de la Consignacion insertada
        $Consignacion = Consignacion::latest('ID_Consignacion')->first();
        return $Consignacion;  
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

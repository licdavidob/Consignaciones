<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Modelos
use App\Models\Consignacion;

//Controladores
use App\Http\Controllers\AveriguacionController;
use App\Http\Controllers\AntecedenteController;
use App\Http\Controllers\PersonaController;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Echo_;

class ConsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $Consignaciones = Consignacion::addSelect('ID_Consignacion','ID_Agencia')->get();
        // $i = 0;
        // foreach ($Consignaciones as $Consignacion) {
        //     $Agencia = $Consignacion->Agencia()->select('Nombre')->get();
        //     $Consignacion['Agencia'] = $Agencia[0]["Nombre"];
        //     $Consignaciones[$i] = $Consignacion;
        //     $i++;  
        // }
        // return $Consignaciones;
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

        //Se obtiene la informacion de la averiguacion previa insertada
        $Averiguacion = $Averiguacion->store($request->Av_Previa);

        //Se registra la consignación
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

        //Si existe un antecedente, se registra
        if($request->Antecedente){
            $Antecedente = new AntecedenteController;
            $Antecedente->store($request->Antecedente,$Consignacion['ID_Consignacion']);
        }
        
        //Si tiene delitos la consignación, se registran a la tabla pivote
        if($request->Delitos){
            foreach ($request->Delitos as $Delito) {
               $Consignacion->Delito()->attach($Delito["Delito_ID"]);
            }
        }

        //Si tiene a persona relacionadas a la consignación, se registran
        if($request->Personas){
            $Persona = new PersonaController;
            $Persona->store($request->Personas,$Consignacion);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Consignacion::findOrFail($id);
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

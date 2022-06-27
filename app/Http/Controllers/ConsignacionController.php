<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Modelos
use App\Models\Consignacion;

//Controladores
use App\Http\Controllers\AveriguacionController;
use App\Http\Controllers\AntecedenteController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\DelitoController;

class ConsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Persona = new PersonaController;
        $Consignaciones = Consignacion::addSelect('ID_Consignacion','ID_Agencia','ID_Averiguacion','ID_Juzgado','Detenido')->where('Estatus',1)->get();
        $i = 0;
        foreach ($Consignaciones as $Consignacion) {
            $Agencia = $Consignacion->Agencia()->select('Nombre')->get();
            $Averiguacion = $Consignacion->Averiguacion()->select('Averiguacion')->get();
            $Personas = $Persona->show($Consignacion['ID_Consignacion']);

            $Consignacion['Con Detenido'] = $Consignacion->Detenido == 1 ? 'Si':'No';
            $Consignacion['Agencia'] = $Agencia[0]["Nombre"];
            $Consignacion['Averiguación'] = $Averiguacion[0]["Averiguacion"];
            $Consignacion['Personas'] = $Personas;
            $Consignaciones[$i] = $Consignacion;
            $i++;  
        }
        return $Consignaciones;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Se obtiene la informacion de la averiguacion previa insertada
        $Averiguacion = new AveriguacionController;
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

        //Si tiene a persona relacionadas a la consignación, se registran
        if($request->Personas){
            $Persona = new PersonaController;
            $Persona->store($request->Personas,$Consignacion);
        } 
        
        //Si tiene delitos la consignación, se registran a la tabla pivote
        if($request->Delitos){
            foreach ($request->Delitos as $Delito) {
               $Consignacion->Delito()->attach($Delito["Delito_ID"]);
            }
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
        $AntecedenteBusqueda = new AntecedenteController;
        $Persona = new PersonaController;
        $Delito = new DelitoController;

        $ConsignacionBusqueda = Consignacion::findOrFail($id);
        $Antecedente = $AntecedenteBusqueda->show($ConsignacionBusqueda['ID_Consignacion']);
        $Agencia = $ConsignacionBusqueda->Agencia()->select('Nombre')->get();
        $Juzgado = $ConsignacionBusqueda->Juzgado()->select('Nombre')->get();
        $Reclusorio = $ConsignacionBusqueda->Reclusorio()->select('Nombre')->get();
        $Averiguacion = $ConsignacionBusqueda->Averiguacion()->select('Averiguacion')->get();
        $Personas = $Persona->show($ConsignacionBusqueda['ID_Consignacion']);
        $Delitos = $Delito->show($ConsignacionBusqueda);
         
        $Consignacion['Fecha'] = $ConsignacionBusqueda->Fecha;
        $Consignacion['Agencia'] = $Agencia[0]["Nombre"];
        $Consignacion['Fojas'] = $ConsignacionBusqueda->Fojas;
        $Consignacion['Av_Previa'] = $Averiguacion[0]["Averiguacion"];
        $Consignacion['Detenido'] = $ConsignacionBusqueda->Detenido == 1 ? 'Si':'No';
        $Consignacion['Juzgado'] = $Juzgado[0]["Nombre"];
        $Consignacion['Reclusorio'] = $Reclusorio[0]["Nombre"];
        $Consignacion['Antecedente'] = $Antecedente;
        $Consignacion['Personas'] = $Personas;
        $Consignacion['Delitos'] = $Delitos;
        $Consignacion['Hora_Recibo'] = $ConsignacionBusqueda->Hora_Recibo ?: '';
        $Consignacion['Hora_Entrega'] = $ConsignacionBusqueda->Hora_Entrega ?: '';
        $Consignacion['Hora_Salida'] = $ConsignacionBusqueda->Hora_Salida ?: '';
        $Consignacion['Hora_Regreso'] = $ConsignacionBusqueda->Hora_Regreso ?: '';
        $Consignacion['Hora_Llegada'] = $ConsignacionBusqueda->Hora_Llegada ?: '';
        $Consignacion['Fecha_Entrega'] = $ConsignacionBusqueda->Fecha_Entrega ?: '';
        $Consignacion['Nota'] = $ConsignacionBusqueda->Nota ?: '';
        
        return $Consignacion;
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
        $Consignacion = Consignacion::findOrFail($id);
        $Consignacion->Estatus = 0;
        $Consignacion->save();
    }
}

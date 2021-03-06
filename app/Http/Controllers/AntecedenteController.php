<?php

namespace App\Http\Controllers;

use App\Models\Antecedente;
use Illuminate\Http\Request;

class AntecedenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($Antecedente,$Consignacion)
    {
        Antecedente::create([
            'Fecha_Antecendente' => $Antecedente[0]['Fecha'],
            'Detenido' => $Antecedente[0]['Detenido'],
            'ID_Juzgado' => $Antecedente[0]['Juzgado'],
            'ID_Consignacion' => $Consignacion,
           ]);   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Antecedente = array();
        $AntecedenteBusqueda = Antecedente::addSelect('Fecha_Antecendente','ID_Juzgado','Detenido')->where('ID_Consignacion',$id)->with('Juzgado')->get();
        if(!$AntecedenteBusqueda->isEmpty()){
            $Juzgado = $AntecedenteBusqueda[0]['Juzgado'];

            $Antecedente['Fecha'] = $AntecedenteBusqueda[0]['Fecha_Antecendente'];
            $Antecedente['Con Detenido'] = $AntecedenteBusqueda[0]['Detenido'] == 1 ? 'Si':'No';
            $Antecedente['Juzgado'] = $Juzgado['Nombre'];
        }

        return $Antecedente;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

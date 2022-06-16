<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Modelos
use App\Models\Persona;

//Controladores
use App\Http\Controllers\AliasController;

class PersonaController extends Controller
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
    public function store($Personas,$Consignacion)
    {
        foreach ($Personas as $Persona) {
            Persona::create([
                'Nombre' => $Persona["Nombre"],
                'Ap_Paterno' => $Persona["Ap_Paterno"],
                'Ap_Materno' => $Persona["Ap_Materno"], 
                'ID_Calidad' => $Persona['Calidad'], 
                'ID_Consignacion' => $Consignacion['ID_Consignacion'],
               ]);
            
            //Se obtiene la informacion de la persona insertada
            $UltimaPersona = Persona::latest('ID_Persona')->first();
            
            //Si se tienen alias en la solicitud, se registran a las personas
            if($Persona["Alias"]){
                $GuardarAlias = new AliasController;
                foreach ($Persona["Alias"] as $Alias) {
                    $Alias = $GuardarAlias->store($Alias["Alias_Titulo"]);
                    $UltimaPersona->Alias()->attach($Alias['ID_Alias']);
                }
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
        //
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

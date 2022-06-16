<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $table = 'persona';

    public function getKeyName(){
        return "ID_Persona";
    }

    protected $fillable = [
        'Nombre',
        'Ap_Paterno',
        'Ap_Materno',
        'ID_Calidad',
        'ID_Consignacion',
    ];

    //Relación muchos a muchos
    public function Alias(){
        return $this->belongsToMany(Delito::class,'alias_persona','ID_Persona','ID_Alias');
    }
}

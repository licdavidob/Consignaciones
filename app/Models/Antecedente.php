<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antecedente extends Model
{
    use HasFactory;

    protected $table = 'antecedente';

    protected $fillable = [
        'Fecha_Antecendente',
        'Detenido',
        'ID_Juzgado',
        'ID_Consignacion',
    ];
}

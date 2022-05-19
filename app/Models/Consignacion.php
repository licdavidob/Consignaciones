<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consignacion extends Model
{
    use HasFactory;
    
    // Laravel por defecto, busca la tabla en minuscula y plural (en este caso buscaría consignacions), en caso de que
    // no aplique a tus tablas, puedes sobreescribir la propiedad table con el nombre verdadero de tu tabla
    protected $table = 'consignacion';

    protected $fillable = [
        'Fecha',
        'ID_Agencia',
        'Fojas',
        'ID_Averiguacion',
        'Detenido',
        'ID_Juzgado',
        'ID_Reclusorio',
        'Hora_Recibo',
        'Hora_Entrega',
        'Hora_Salida',
        'Hora_Regreso',
        'Hora_Llegada',
        'Fecha_Entrega',
        'Nota'
    ];
}

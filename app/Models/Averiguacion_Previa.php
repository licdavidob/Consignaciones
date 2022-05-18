<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Averiguacion_Previa extends Model
{
    use HasFactory;
    
    protected $table = 'averiguacion_previa';
    
    protected $fillable = [
        'Averiguacion'
    ];
}

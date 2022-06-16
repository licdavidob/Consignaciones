<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alias extends Model
{
    use HasFactory;

    protected $table = 'alias';

    public function getKeyName(){
        return "ID_Alias";
    }

    protected $fillable = [
        'Alias',
    ];
}

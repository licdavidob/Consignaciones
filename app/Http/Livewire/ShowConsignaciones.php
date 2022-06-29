<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Controllers\ConsignacionController;

class ShowConsignaciones extends Component
{
    // Así podemos hacer uso de una variable, que pasamos por el componente
    // public $title;
    // $title = 
    public function render()
    // Revisa si hay cambios, si los hay se hace la petición al servidor y vuelve a renderizar
    {
        $controlador = new ConsignacionController;
        $resultado = $controlador->index();
        // $personas=$resultado['Personas'];
        // $personas='Personas';
        // return view('livewire.show-consignaciones', ['consignacion' => $resultado]);
        // return view('livewire.show-consignaciones', compact('resultado', 'personas'));
        return view('livewire.show-consignaciones', compact('resultado'));
    }
}

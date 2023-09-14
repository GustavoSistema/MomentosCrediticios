<?php

namespace App\Livewire;

use App\Models\Cobranza;
use Livewire\Component;

class Cobranzas extends Component
{
   /*public function render()
    {
        return view('livewire.cobranzas');
    }*/

    public function render()
    {
    $cobranzas = Cobranza::with('prestamo')->get();

    return view('livewire.cobranzas', compact('cobranzas'));
    }

}
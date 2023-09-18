<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\prestamo;
use Livewire\Component;
use Livewire\Attributes\On;

class Prestamos extends Component
{
    #[On('render')]

    /*public function render()
    {
        return view('livewire.prestamos');
    }*/

    public function render()
    {
        $prestamos = prestamo::with('cliente')->get();

        return view('livewire.prestamos', compact('prestamos'));
    }
    
}

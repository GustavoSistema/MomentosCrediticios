<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class Clientes extends Component
{
    
    /*public function render()
    {
        return view('livewire.clientes')-compact;
    }*/
    public $nombre, $estado, $apellido, $dni, $genero, $celular;
    public $search = "";
    use WithPagination;
    

    public function render()
    {

        $clientes = Cliente::where(function ($query) {
            $query->where('nombre', 'LIKE', '%' . $this->search . '%')
                ->orWhere('apellido', 'LIKE', '%' . $this->search . '%');
        })->paginate(10);
        
        return view('livewire.clientes', compact('clientes'));
    }
   
}

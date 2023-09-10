<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Component;

class CrearCliente extends Component
{
    /*public function render()
    {
        return view('livewire.crear-cliente');
    }*/
    public $nombre, $estado, $apellido, $genero;
    public $open=false;

    protected $rules = [
        'nombre'=> 'required' ,
        'estado'=> 'required' ,
        'apellido'=> 'required' ,
        'genero'=> 'required' ,
        
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.crear-cliente');
    }

    public function crearCliente()
    {
        $this->validate();

        Cliente::create([
            'nombre' => $this->nombre,
            'estado' => $this->estado,
            'apellido' => $this->apellido,
            'genero' => $this->genero,
        ]);

        $this->reset(['open', 'nombre', 'estado', 'apellido', 'genero']);

    
        $this->emitTo('clientes','render');

        
    }
}

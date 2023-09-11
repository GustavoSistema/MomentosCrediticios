<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Component;

class CrearCliente extends Component
{
    
    public $nombre, $estado, $apellido, $dni, $genero;
    public $opcionesGenero = ['Masculino', 'Femenino', 'Otro'];
    public $open=false;

    protected $rules = [
        'nombre'=> 'required' ,
        'estado'=> 'required' ,
        'apellido'=> 'required' ,
        'dni'=>'required',
        'genero' => 'required',
        
    ];

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
            'dni' => $this->dni,

        ]);   
        
        $this->reset(['open', 'nombre', 'apellido', 'dni', 'genero', 'estado']);
        $this->dispatch('render');
        $this->dispatch('alert');
        
    }  

    public function resetForm()
    {
        $this->open = false;
        $this->nombre = null;
        $this->apellido = null;
        $this->dni = null;
        $this->genero = null;
        $this->estado = null;
    }

}

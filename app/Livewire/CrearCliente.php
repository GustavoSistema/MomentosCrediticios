<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Component;

class CrearCliente extends Component
{

    public $nombre, $estado, $apellido, $dni, $genero, $celular, $correo, $direccion;
    public $opcionesGenero = ['Masculino', 'Femenino', 'Otro'];
    public $open = false;

    protected $rules = [
        'nombre' => 'required',
        'estado' => 'required',
        'apellido' => 'required',
        'dni' => 'required',
        'genero' => 'required',
        'celular' => 'required',
        'direccion' => 'required',
        'correo' => 'required|email',
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
            'celular' => $this->celular,
            'direccion' => $this->direccion,
            'correo' => $this->correo,


        ]);

        $this->reset(['open', 'nombre', 'apellido', 'dni', 'genero', 'celular', 'correo', 'direccion','estado']);
        $this->dispatch('render');
        $this->dispatch('CustomAlert', ['titulo' => 'Bien Hecho', 'mensaje' => 'El cliente se creo satisfactoriamente', 'icono' => 'success']);
    }

    public function resetForm()
    {
        $this->open = false;
        $this->nombre = null;
        $this->apellido = null;
        $this->dni = null;
        $this->genero = null;
        $this->celular = null;
        $this->correo = null;
        $this->direccion = null;
        $this->estado = null;
    }
}

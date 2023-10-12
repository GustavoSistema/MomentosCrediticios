<?php

namespace App\Livewire;

use App\Models\Taller;
use Livewire\Component;

class CrearTaller extends Component
{
    public $open = false;
    public $nombre, $direccion, $ruc, $representante;

    protected $rules = [
        "nombre" => "required",
        "direccion" => "required",
        "ruc" => "required|max:11",
        "representante" => "required",
    ];

    public function render()
    {
        return view('livewire.crear-taller');
    }

    public function crearTaller()
    {
        $this->validate();

        Taller::create([
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'ruc' => $this->ruc,
            'representante' => $this->representante,
        ]);
        $this->reset(['open', 'nombre', 'direccion','ruc', 'representante']);
        $this->dispatch('render');
        $this->dispatch('CustomAlert', ['titulo' => 'Bien Hecho', 'mensaje' => 'El Taller se creo satisfactoriamente', 'icono' => 'success']);
    }

    public function resetForm()
    {
        $this->open = false;
        $this->nombre = null;
        $this->direccion = null;
        $this->ruc = '';
        $this->representante = '';
    }
}

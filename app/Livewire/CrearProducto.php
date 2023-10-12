<?php

namespace App\Livewire;

use App\Models\Producto;
use Livewire\Component;

class CrearProducto extends Component
{
    public $open = false;
    public $nombre;

    protected $rules = [
        "nombre" => "required",
    ];

    public function render()
    {
        return view('livewire.crear-producto');
    }

    public function crearProducto()
    {
        $this->validate();

        Producto::create([
            'nombre' => $this->nombre,
        ]);
        $this->reset(['open', 'nombre']);
        $this->dispatch('render');
        $this->dispatch('CustomAlert', ['titulo' => 'Bien Hecho', 'mensaje' => 'El Producto se creo satisfactoriamente', 'icono' => 'success']);
    }

    public function resetForm()
    {
        $this->open = false;
        $this->nombre = null;
    }
}

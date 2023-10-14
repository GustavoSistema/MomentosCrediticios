<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class CreatePermiso extends Component
{
    public $nombre,$descripcion;
    public $open=false;

    protected $rules=[
        "nombre"=>"required|min:3",
        "descripcion"=>"required|min:3",
    ];

    public function render()
    {
        return view('livewire.create-permiso');
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function crearPermiso(){
        $this->validate();
        $permiso=Permission::create(["name"=>$this->nombre,"descripcion"=>$this->descripcion,"guard_name"=>"web"]);
        //$this->emitTo("admin-permisos","render");
        $this->reset(["nombre", "descripcion", "open"]);
        $this->dispatch('render');
        $this->dispatch('CustomAlert', ['titulo' => 'Bien Hecho', 'mensaje' => 'Se creo correctamente el Permiso.', 'icono' => 'success']);
    }
}

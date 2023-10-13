<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class AdminPermisos extends Component
{
    use WithPagination;

    public $sort, $direction, $cant, $search, $permiso, $name, $descripcion;
    public $permissionsid;

    public $editando;

    protected $rules = [
        "name" => "required|string",
        "descripcion" => "nullable|string"
    ];

    protected $listeners = ["render"];

    public function mount()
    {
        $this->direction = 'desc';
        $this->sort = 'id';
        $this->cant = 10;
    }
    /*
    public function render()
    {
        return view('livewire.admin-permisos');
    }*/

    public function render()
    {
        $permisos = Permission::where([
                ['name', 'like', '%' . $this->search . '%']
            ])
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);
        return view('livewire.admin-permisos', compact('permisos'));
    }

    public function order($sort)
    {
        if ($this->sort = $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

    /*public function editarPermiso(Permission $permiso)
    {
        $this->name = $permiso->name;
        $this->descripcion = $permiso->descripcion;
        $this->editando = true;
    }*/

    public function edit($id)
    {
        $permiso = Permission::find($id);
        if ($permiso) {
            $this->permissionsid = $permiso->id;
            $this->name = $permiso->name;
            $this->descripcion = $permiso->descripcion;
            $this->editando = true;
        }
    }

    public function actualizar()
    {
        $this->validate();
        if ($this->permissionsid) {
            $permiso = Permission::find($this->permissionsid);

            if ($permiso) {
                $permiso->update([
                    'name' => $this->name,
                    'descripcion' => $this->descripcion,
                ]);
                $this->editando = false;
                $this->dispatch('render');
                $this->dispatch('CustomAlert', ['titulo' => 'Bien Hecho', 'mensaje' => 'Se actualizó correctamente el permiso.', 'icono' => 'success']);
            }
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}

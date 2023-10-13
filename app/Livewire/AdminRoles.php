<?php

namespace App\Livewire;

use App\Models\Roles;
use FontLib\Table\Type\name;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminRoles extends Component
{
    use WithPagination;

    public $sort, $direction, $cant, $search, $rol, $permisos, $name;
    public $selectedPermisos = [];
    public $rolid;
    public $editando = false;

    protected $rules = [
        "rol.name" => "required",
        "selectedPermisos" => "array|min:1",
    ];

    protected $listeners = ["render"];

    public function mount()
    {
        $this->direction = 'desc';
        $this->sort = 'id';
        $this->cant = 10;
    }

    /*public function render()
    {
        return view('livewire.admin-roles');
    }*/

    public function render()
    {
        $roles = Roles::where([
            ['name', 'like', '%' . $this->search . '%']
        ])
            ->orderBy($this->sort, $this->direction)
            ->paginate($this->cant);
        return view('livewire.admin-roles', compact("roles"));
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

    /*public function edit($id)
    {
        $rol = Role::find($id);
        if ($rol) {
            $this->rolid = $rol->id;
            $this->name = $rol->name;
            $this->permisos = Permission::all();
            $this->selectedPermisos = $rol->Permissions->pluck('name')->all();
            $this->editando = true;
        }
    }*/

    public function edit(Role $rol)
    {
        $this->rol = $rol;
        $this->name = $rol->name; 
        $this->permisos = Permission::all();
        $this->selectedPermisos = $rol->Permissions->pluck('name')->all();
        $this->editando = true;
    }

    public function actualizar()
    {
        $this->validate();
        // Actualiza el nombre del rol en el modelo Role
        $this->rol->name = $this->name;
        $this->rol->save();
        // Sincroniza los permisos
        $this->rol->syncPermissions($this->selectedPermisos);
        //$this->reset(["editando"]);
        // Restablece la variable de edición
        $this->editando = false;
        // Vuelve a renderizar la vista
        $this->dispatch('render');
        // Muestra una alerta de éxito
        $this->dispatch('CustomAlert', ['titulo' => 'Bien Hecho', 'mensaje' => 'Se actualizó correctamente el Rol.', 'icono' => 'success']);
    }

    protected $messages = [
        'selectedPermisos.min' => 'Debes seleccionar como mínimo un permiso para este rol.',
    ];
}

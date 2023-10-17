<?php

namespace App\Livewire;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Usuarios extends Component
{
    use WithFileUploads;
    use WithPagination;
    

    public $sort,$direction,$cant,$search,$name,$email, $firma;
    public $selectedRoles=[];
    public $roles;
    public $editando=false;
    public $usuario;

    public $rules=[
        "name"=>"required|string",
        "email"=>"required|email",
        "selectedRoles"=>"array|min:1",
    ];
    
    public function mount(){
        $this->roles=Roles::all();
        $this->direction='desc';
        $this->sort='id';       
        $this->cant=10;
    }

    public function updated($propertyName){
        
        $this->validateOnly($propertyName);
    }

    /*
    public function render()
    {
        return view('livewire.usuarios');
    }*/

    public function render()
    {
        $usuarios=User::
        where([
            ['id','!=',Auth::id()],
            ['name','like','%'.$this->search.'%']
        ])
        ->orWhere([
            ['id','!=',Auth::id()],
            ['email','like','%'.$this->search.'%']
        ])
        ->orderBy($this->sort,$this->direction)
        ->paginate($this->cant);
        return view('livewire.usuarios',compact('usuarios'));
    }

    public function order($sort)
    {
        if($this->sort=$sort){
            if($this->direction=='desc'){
                $this->direction='asc';
            }else{
                $this->direction='desc';
            }
        }else{
            $this->sort=$sort;
            $this->direction='asc';
        }        
    }

    public function actualizar(){
        $this->validate();
        $this->usuario->name = $this->name;
        $this->usuario->email = $this->email; 
        $this->usuario->save();
        $this->usuario->syncRoles($this->selectedRoles);
        //$this->usuario=User::make();
        $this->reset(["editando"]);   
        $this->dispatch('render');
        $this->dispatch('CustomAlert', ['titulo' => 'Bien Hecho', 'mensaje' => 'Se actualizó correctamente el Usuario.', 'icono' => 'success']);

    }

    public function editarUsuario(User $usuario){
        
        $this->usuario=$usuario;
        $this->name=$usuario->name;         
        $this->email=$usuario->email;
        $this->selectedRoles=$usuario->Roles->pluck('name')->all();
        $this->editando=true;
    }

    protected $messages = [
        'selectedRoles.min' => 'Debes seleccionar como mínimo un rol para este usuario.',        
    ];
}

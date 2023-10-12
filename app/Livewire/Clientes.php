<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

use Livewire\Attributes\On;

class Clientes extends Component
{

    public $nombre, $estado, $apellido, $dni, $genero, $celular, $correo, $direccion;
    public $opcionesGenero = ['Masculino', 'Femenino', 'Otro'];
    public $search = "";
    public $editando;
    public $clienteid;
    use WithPagination;
    #[On('render')]
    

    public function render()
    {
        //dd($this->search);
        $clientes = Cliente::where(function ($query) {
            $query->where('nombre', 'LIKE', '%' . $this->search . '%')
                ->orWhere('dni', 'LIKE', '%' . $this->search . '%');
        })->paginate(10);

        return view('livewire.clientes', compact('clientes'));
    }
    
    public function delete($id)
    {
       // Cliente::find($id)->delete();
        $this->dispatch('delete', json_encode($id) );
    }

    #[On('destroy')] 
    public function destroy($kate)
    {
        //dd($kate);
       Cliente::find($kate)->delete();
       $this->dispatch('render');
       
    }

    public function edit($id)
    {
        $this->resetForm(); // Limpia los campos antes de la edición
        $cliente = Cliente::find($id);
        
        if ($cliente) {
            $this->clienteid = $cliente->id; // Configura el ID del cliente que se está edita
            $this->nombre = $cliente->nombre;
            $this->apellido = $cliente->apellido;
            $this->dni = $cliente->dni;
            $this->genero = $cliente->genero;
            $this->estado = $cliente->estado;
            $this->celular = $cliente->celular;
            $this->correo = $cliente->correo;
            $this->direccion = $cliente->direccion;

            $this->editando = true;
        }
    }
    public function actualizar()
    {
        $this->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => 'required',
            'genero' => 'required',
            'estado' => 'required',
            'celular' => 'required',
            'correo' => 'required',
            'direccion' => 'required',

        ]);

        if ($this->clienteid) {
            $cliente = Cliente::find($this->clienteid);

            if ($cliente) {
                $cliente->update([
                    'nombre' => $this->nombre,
                    'apellido' => $this->apellido,
                    'dni' => $this->dni,
                    'genero' => $this->genero,
                    'estado' => $this->estado,
                    'celular' => $this->celular,
                    'correo' => $this->correo,
                    'direccion' => $this->direccion,
                ]);

                // Limpia los campos y cierra el modal de edición
                $this->resetForm();
                $this->editando = false;
                $this->dispatch('render');
                $this->dispatch('CustomAlert', ['titulo' => 'Bien Hecho', 'mensaje' => 'El Cliente se actualizo correctamente', 'icono' => 'success']);
            }
        }
    }


    private function resetForm()
    {
        $this->nombre = '';
        $this->apellido = '';
        $this->dni = '';
        $this->genero = '';
        $this->estado = '';
        $this->celular = '';
        $this->correo = '';
        $this->direccion = '';
        $this->clienteid = null;
    }
}

<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

use Livewire\Attributes\On;

class Clientes extends Component
{

    public $nombre, $estado, $apellido, $dni, $genero;
    public $opcionesGenero = ['Masculino', 'Femenino', 'Otro'];
    public $search = "";
    public $editando;
    public $clienteid;
    use WithPagination;
    #[On('render')]

    public function render()
    {

        $clientes = Cliente::where(function ($query) {
            $query->where('nombre', 'LIKE', '%' . $this->search . '%')
                ->orWhere('dni', 'LIKE', '%' . $this->search . '%');
        })->paginate(10);

        return view('livewire.clientes', compact('clientes'));
    }
    public function delete($id)
    {
        Cliente::find($id)->delete();
        $this->dispatch('delete');
    }

    public function edit($id)
    {
        $this->resetForm(); // Limpia los campos antes de la edición
        $cliente = Cliente::find($id);
        
        if ($cliente) {
            $this->clienteid = $cliente->id; // Configura el ID del cliente que se está editando
            $this->nombre = $cliente->nombre;
            $this->apellido = $cliente->apellido;
            $this->dni = $cliente->dni;
            $this->genero = $cliente->genero;
            $this->estado = $cliente->estado;

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
                ]);

                // Limpia los campos y cierra el modal de edición
                $this->resetForm();
                $this->editando = false;
                $this->dispatch('alert', 'Cliente actualizado con éxito');
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
        $this->clienteid = null; // Reinicializa la variable clienteid
    }
}

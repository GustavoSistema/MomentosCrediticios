<?php

namespace App\Livewire;

use App\Models\Evalua;
use Livewire\Component;
use Livewire\Attributes\On;

class Evaluacion extends Component
{
    public $estados = ['Por Revisar', 'Revisado', 'Observado'];
    public $editando;
    public $estadoActual;
    public $nuevoEstado;
    #[On('render')]

    public function render()

    {
        $evaluacion = Evalua::with('taller')->get();
        return view('livewire.evaluacion', compact('evaluacion'));
    }


    public function editEstado($id)
    {
        $evaluacion = Evalua::find($id);

        if ($evaluacion) {
            $this->estadoActual = $id;
            $this->nuevoEstado = $evaluacion->estado;
            $this->editando = true;
        } else {
            session()->flash('error', 'La evaluación no se encontró.');
        }
    }

    public function actualizarEstado()
    {
        $this->validate([
            'nuevoEstado' => 'required|in:Por Revisar,Revisado,Observado', // Valida que el nuevo estado sea uno de los valores permitidos.
        ]);
        if ($this->editando) {
            $evaluacion = Evalua::find($this->estadoActual);
            if ($evaluacion) {
                $evaluacion->update([
                    'estado' => $this->nuevoEstado,
                ]);
                $this->editando = false;
                $this->dispatch('CustomAlert', ['titulo' => 'Bien Hecho', 'mensaje' => 'El estado se actualizo', 'icono' => 'success']);
            } else {
                session()->flash('error', 'La evaluación no se encontró.');
            }
        }
    }
}

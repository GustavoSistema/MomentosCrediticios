<?php

namespace App\Livewire;

use App\Models\Evalua;
use App\Models\Taller;
use Livewire\Component;
use Livewire\Attributes\On;

class Evaluacion extends Component
{
    public $taller, $nomcliente, $apecliente, $dnicliente, $celular, $email, $fecha, $documento;
    public $estados = ['Por Revisar', 'Revisado', 'Observado'];
    public $editando;
    public $editando2;
    public $editando3;
    public $estadoActual;
    public $nuevoEstado;
    public $evaluacionId;
    public $selectedEvaluacionId;
    public $documentos = [];
    #[On('render')]

    public function render()
    {
        $talleres = Taller::all();
        $evaluacion = Evalua::with('taller')->get();
        return view('livewire.evaluacion', compact('evaluacion', 'talleres'));
    }

    public function editEstado($id)
    {
        $evaluacion = Evalua::find($id);

        if ($evaluacion) {
            $this->estadoActual = $id;
            $this->nuevoEstado = $evaluacion->estado;
            $this->editando = true;
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
            }
        }
    }

    public function edit($id)
    {
        $this->resetForm(); // Limpia los campos antes de la edición
        $evaluacion = Evalua::find($id);

        if ($evaluacion) {
            $this->evaluacionId = $evaluacion->id;
            $this->taller = $evaluacion->idTaller; // Configura el ID del cliente que se está edita
            $this->nomcliente = $evaluacion->nomcliente;
            $this->apecliente = $evaluacion->apecliente;
            $this->dnicliente = $evaluacion->dnicliente;
            $this->celular = $evaluacion->celular;
            $this->email = $evaluacion->email;
            $this->fecha = $evaluacion->fecha;
            $this->email = $evaluacion->email;
            //$this->documento = $evaluacion->documento;

            $this->editando2 = true;
        }
    }
    public function actualizar()
    {

        $this->validate([
            'taller' => 'required',
            'nomcliente' => 'required',
            'apecliente' => 'required',
            'dnicliente' => 'required|max:8',
            'celular' => 'required|max:9',
            'email' => 'required',
            'fecha' => 'required|date',
            //'documento' => 'required',
        ]);

        if ($this->evaluacionId) {
            $evaluacion = Evalua::find($this->evaluacionId);

            if ($evaluacion) {
                $evaluacion->update([
                    'idTaller' => $this->taller,
                    'nomcliente' => $this->nomcliente,
                    'apecliente' => $this->apecliente,
                    'dnicliente' => $this->dnicliente,
                    'celular' => $this->celular,
                    'email' => $this->email,
                    'fecha' => $this->fecha,
                    //'documento' => $this->documento,
                ]);
                $this->resetForm();
                $this->editando2 = false;
                $this->dispatch('render');
                $this->dispatch('CustomAlert', ['titulo' => 'Bien Hecho', 'mensaje' => 'La evaluacion se actualizo correctamente', 'icono' => 'success']);
            }
        }
    }

    public function verDocumento($evaluacionId)
    {
        $this->selectedEvaluacionId = $evaluacionId;
        $evaluacion = Evalua::find($evaluacionId);

        if ($evaluacion) {
            // Obtener los nombres de los documentos relacionados con la evaluación.
            $documentos = $evaluacion->documentos;

            // Verificar si hay documentos y convertirlos en un array.
            $this->documentos = $documentos ? explode(',', $documentos) : [];

            $this->editando3 = true;
        }
    }

    public function delete($id)
    {
        // Cliente::find($id)->delete();
        $this->dispatch('delete', json_encode($id));
    }

    #[On('destroy')]

    public function destroy($kate)
    {
        //dd($kate);
        Evalua::find($kate)->delete();
        $this->dispatch('render');
    }

    public function resetForm()
    {
        $this->taller = null;
        $this->nomcliente = '';
        $this->apecliente = '';
        $this->dnicliente = '';
        $this->celular = '';
        $this->email = '';
        $this->fecha = '';
        $this->documento = null;
    }
}

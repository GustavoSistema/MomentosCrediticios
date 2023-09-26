<?php

namespace App\Livewire;

use App\Models\Evalua;
use App\Models\Taller;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearEvaluacion extends Component
{
    public $open = false;
    public $taller;
    public $nomcliente;
    public $apecliente;
    public $dnicliente;
    public $celular;
    public $email;
    public $fecha;
    public $documento;
    public $borradocumento;
    public $estado;
    public $estados = ['Por Revisar', 'Revisado', 'Observado'];
    public $documentos = [];
    use WithFileUploads;



    /*public function render()
    {
        return view('livewire.crear-evaluacion');
    }*/
    protected $rules = [
        'taller' => 'required',
        'nomcliente' => 'required',
        'apecliente' => 'required',
        'dnicliente' => 'required|max:8',
        'celular' => 'required|max:9',
        'email' => 'required',
        'fecha' => 'required|date',
        'documentos.*' => 'required|file|mimes:pdf,docx|max:10240',
    ];

    public function mount()
    {
        $this->borradocumento = rand();
    }

    public function render()
    {
        $talleres = Taller::all();
        return view('livewire.crear-evaluacion', ['talleres' => $talleres]);
    }

    public function crearEvaluacion()
    {
        $this->validate();
        $documentoPaths = [];
        foreach ($this->documentos as $documento) {
            $documentoPath = $documento->store('temp', 'public');
            $documentoPaths[] = $documentoPath;
        }
        Evalua::create([
            'idTaller' => $this->taller,
            'nomcliente' => $this->nomcliente,
            'apecliente' => $this->apecliente,
            'dnicliente' => $this->dnicliente,
            'celular' => $this->celular,
            'email' => $this->email,
            'fecha' => $this->fecha,
            'documentos' => json_encode($documentoPaths),
            'estado' => 'Por Revisar',

        ]);
        $this->resetForm();
        $this->documentos = [];
        $this->dispatch('render');
        $this->dispatch('CustomAlert', ['titulo' => 'Bien Hecho', 'mensaje' => 'La evaluacion se envio correctamente', 'icono' => 'success']);
        $this->borradocumento = rand();
    }

    public function resetForm()
    {
        $this->open = false;
        $this->taller = null;
        $this->nomcliente = '';
        $this->apecliente = '';
        $this->dnicliente = '';
        $this->celular = '';
        $this->email = '';
        $this->fecha = '';
        $this->borradocumento = null;
    }
}

<?php

namespace App\Livewire;

use App\Models\Documento;
use App\Models\Evalua;
use App\Models\Taller;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class CrearEvaluacion extends Component
{
    public $open = false;
    public $taller, $nomcliente, $apecliente, $dnicliente, $fecha;
    public $documento;
    public $borradocumento;
    public $estado;
    public $estados = ['Por Revisar', 'Revisado', 'Observado'];
    public $documentos = [];
    public $identificador;
    public $mostrarIconoAgregar = false;
    public $nuevosDocumentos = []; // icono + agregar archivos
    private $disk = "public";
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
        'fecha' => 'required|date',
        'documentos.*' => 'required|file|mimes:pdf,docx|max:10240',
    ];

    public function mount()
    {
        $this->borradocumento = rand();
        $this->identificador = uniqid();
    }

    public function render()
    {
        $talleres = Taller::all();
        return view('livewire.crear-evaluacion', ['talleres' => $talleres]);
    }

    protected function formatName($name)
    {
        return Str::slug($name, '');
    }
    public function crearEvaluacion()
    {
        $this->validate();
        $documentoPaths = [];
        $dniFolder = $this->dnicliente . '_' . $this->formatName($this->nomcliente) . $this->formatName($this->apecliente);
        $eval = Evalua::create([
            'idTaller' => $this->taller,
            'nomcliente' => $this->nomcliente,
            'apecliente' => $this->apecliente,
            'dnicliente' => $this->dnicliente,
            'fecha' => $this->fecha,
            'documentos' => json_encode($documentoPaths),
            'estado' => 'Por Revisar',

        ]);
        $ids = [];
        foreach($this->documentos as $key=>$documento){
            $file_save= new Documento();
            $file_save->nombre = $dniFolder."-".$key;
            $file_save->extension=$documento->extension();
            $file_save->ruta = $documento->storeAs('public/DocumentosEvaluacion',$file_save->nombre.'.'.$documento->extension());
            //$guardaarchivo = $file_save->save();                        
            


            $guardaarchivo = Documento::create([
                'nombre'=>$file_save->nombre,
                'ruta'=>$file_save->ruta,
                'extension'=>$file_save->extension,
                
            ]);
            $ids[] = $guardaarchivo->id;
        }
        $eval->Documento()->attach($ids);
        
        $this->resetForm();
        $this->documentos = [];
        $this->mostrarIconoAgregar = false;
        $this->dispatch('render');
        $this->dispatch('CustomAlert', ['titulo' => 'Bien Hecho', 'mensaje' => 'La evaluacion se envio correctamente', 'icono' => 'success']);
        $this->borradocumento = rand();
    }

    
    public function guardaDocumento($documento){
        
    }

    public function deleteDocumentUpload($index)
    {
        unset($this->documentos[$index]);
        if (count($this->documentos) == 0) {
            $this->mostrarIconoAgregar = false; // Oculta el icono si no hay documentos
        }
    }
    public function limpiarDocumentos()
    {
        $this->documentos = [];
        $this->mostrarIconoAgregar = false; // Resetea la variable al limpiar
    }
    public function mostrarIcono()
    {
        $this->mostrarIconoAgregar = true; // Muestra el icono cuando se selecciona un archivo

    }

    public function resetForm()
    {
        $this->open = false;
        $this->taller = null;
        $this->nomcliente = '';
        $this->apecliente = '';
        $this->dnicliente = '';
        $this->fecha = '';
        $this->borradocumento = null;
        $this->documentos = [];
    }
}

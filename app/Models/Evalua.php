<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evalua extends Model
{
    use HasFactory;
    protected $table = 'evaluacion';
    public $fillable = [
        'idTaller',
        'nomcliente',
        'apecliente',
        'dnicliente',
        'celular',
        'email',
        'fecha',
        'estado',
    ];

    public function taller()
    {
        return $this->belongsTo(Taller::class, 'idTaller');
    }

    
    /*public function documentosAdjuntos()
    {
        return $this->hasMany(DocumentoAdjunto::class, 'evaluacion_id');
    }

    public $evaluacion;

    public function mount($evaluacionId)
    {
        // Cargar la evaluación con sus documentos adjuntos
        $this->evaluacion = Evalua::with('documentosAdjuntos')->find($evaluacionId);
    }*/
}

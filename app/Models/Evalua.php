<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Evalua extends Model
{
    use HasFactory;
    protected $table = 'evaluacion';
    public $fillable = [
        'idTaller',
        'nomcliente',
        'apecliente',
        'dnicliente',
        'fecha',
        'estado',
    ];

    public function taller()
    {
        return $this->belongsTo(Taller::class, 'idTaller');
    }
    public function Documento(): BelongsToMany
    {
        return $this->belongsToMany(Documento::class, 'Documentos_Evaluacion', 'idEvaluacion', 'idDocumentos');
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

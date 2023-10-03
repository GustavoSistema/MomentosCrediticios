<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Documento extends Model
{
    use HasFactory;
    protected $table = 'documentos';
    public $fillable = [
        'ruta', 'extension', 'nombre',
    ];

   
    public function Evaluacion(): BelongsToMany
    {
        return $this->belongsToMany(Evalua::class, 'Documentos_Evaluacion', 'idDocumentos', 'idEvaluacion');
    }
}

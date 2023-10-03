<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento_Evalua extends Model
{
    use HasFactory;
    protected $table = 'documentos:evaluacion';
    public $fillable = [
        'idEvaluacion', 'idDocumentos',
    ];
}

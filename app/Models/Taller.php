<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taller extends Model
{
    use HasFactory;
    protected $table = 'taller';
    public $fillable = [
        'nombre',
        'direccion',
        'ruc',
        'representante',
    ];
    public function evaluaciones()
    {
        return $this->hasMany(Evaluacion::class, 'idTaller');
    }
}

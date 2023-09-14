<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobranza extends Model
{
    use HasFactory;
    protected $table = 'cobranzas';
    public $fillable = [
        'idPrestamos', 'estado', 'fechapago',
    ];
    public function prestamo()
    {
        return $this->belongsTo(prestamo::class, 'idPrestamos');
    }
}

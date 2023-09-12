<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prestamo extends Model
{
    use HasFactory;
    protected $table = 'prestamos';
    public $fillable = [
        'idCliente','producto', 'monto','interes', 'cuotas', 'fpago', 'fecha', 'vcuota', 'vinteres', 'mtotal' ,
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }

}

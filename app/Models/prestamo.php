<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prestamo extends Model
{
    use HasFactory;
    protected $table = 'prestamos';
    public $fillable = [
        'idCliente', 'idProducto', 'idfPago', 'monto', 'interes', 'cuotas', 'fecha', 'vcuota', 'vinteres', 'mtotal',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'idCliente');
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }
    public function formaPago()
    {
        return $this->belongsTo(FormaPago::class, 'idfPago');
    }
    public function cobranzas()
    {
        return $this->hasMany(Cobranza::class, 'idPrestamos');
    }
    protected $casts = [
        'cuotas' => 'json',
    ];
}

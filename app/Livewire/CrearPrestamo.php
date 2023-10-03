<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\FormaPago;
use App\Models\prestamo;
use App\Models\Producto;
use Livewire\Component;
use function number_format;

class CrearPrestamo extends Component
{
    public $open = false;
    public $clienteDni;
    public $clienteNombres;
    public $clienteEncontrado = false;
    public $productoId;
    public $opcionesProducto;
    public $opcionesFormaPago;
    public $monto;
    public $interes;
    public $cuotas;
    public $formaPago;
    public $fecha;
    public $vcuota;
    public $vinteres;
    public $mtotal;
    public $calculosRealizados = false;

    protected $rules = [
        'clienteDni' => 'required|exists:clientes,dni',
        'clienteNombres' => 'required',
        'productoId' => 'required',
        'monto' => 'required|numeric|min:1',
        'interes' => 'required|numeric|min:0',
        'cuotas' => 'required|integer|min:1',
        'formaPago' => 'required',
        'fecha' => 'required|date',
        'vcuota' => 'required',
        'vinteres' => 'required',
        'mtotal' => 'required',

    ];

    public function render()
    {        
        $productos = Producto::all();
        $formasPago = FormaPago::all(); 

        return view('livewire.crear-prestamo', [
            'productos' => $productos,
            'formasPago' => $formasPago,
        ]);
    }

    public function crearPrestamo()
    {
        
        $this->validate();
        $cuotas = intval($this->cuotas);
        // Obtener el ID del cliente usando el DNI
        $cliente = Cliente::where('dni', $this->clienteDni)->first();
        prestamo::create([
            'idCliente' => $cliente->id,
            'idProducto' => $this->productoId,
            'monto' => $this->monto,
            'interes' => $this->interes,
            'cuotas' => (int) $this->cuotas,
            'idfPago' => $this->formaPago,
            'fecha' => $this->fecha,
            'vcuota' => $this->vcuota,
            'vinteres' => $this->vinteres,
            'mtotal' => $this->mtotal,

        ]);
        
        if ($cliente) {
            $cliente->estado = 'Con crédito';
            $cliente->save();
        }

        $this->resetForm();
        $this->dispatch('render');
        $this->dispatch('CustomAlert',['titulo'=>'Bien Hecho','mensaje'=>'El Prestamo se creo satisfactoriamente','icono'=>'success']);
        $this->open = false;
    }

    public function buscarCliente()
    {
        $cliente = Cliente::where('dni', $this->clienteDni)->first();

        if ($cliente) {
            $this->clienteNombres = $cliente->nombre . ' ' . $cliente->apellido;
            $this->clienteEncontrado = true;
        } else {
            $this->clienteNombres = '';
            $this->clienteEncontrado = false;
        }
    }
    
    public function calcular()
    {
        // Validaciones de entrada (puedes personalizar estas validaciones según tus requisitos)
        $this->validate([
            'monto' => 'required|numeric|min:1',
            'interes' => 'required|numeric|min:0',
            'cuotas' => 'required|integer|min:1',
        ]);
        // Obtener los valores de entrada
        $montoPrestamo = $this->monto;
        $tasaInteres = $this->interes;
        $numeroCuotas = $this->cuotas;

        // Calcular el valor de interés
        $valorInteres = ($montoPrestamo * ($tasaInteres / 100));
        // Calcular el valor de la cuota
        $cuota = ($montoPrestamo / $numeroCuotas) + $valorInteres / $numeroCuotas;
        // Calcular el monto total
        $montoTotal = $montoPrestamo + $valorInteres;
        // Redondear los resultados a 2 decimales
        $cuota = number_format($cuota, 2);
        $valorInteres = number_format($valorInteres, 2);
        $montoTotal = number_format($montoTotal, 2);

        // Actualizar las propiedades con los resultados
        $this->vcuota = $cuota;
        $this->vinteres = $valorInteres;
        $this->mtotal = $montoTotal;

        // Marcar los cálculos como realizados
        $this->calculosRealizados = true;
    }

    public function resetForm()
    {
        $this->open = false;
        $this->clienteDni = '';
        $this->clienteNombres = '';
        $this->clienteEncontrado = false;
        $this->productoId = '';
        $this->monto = '';
        $this->interes = '';
        $this->cuotas = '';
        $this->formaPago = '';
        $this->fecha = '';
        $this->vcuota = '';
        $this->vinteres = '';
        $this->mtotal = '';
        $this->calculosRealizados = false;
    }
}

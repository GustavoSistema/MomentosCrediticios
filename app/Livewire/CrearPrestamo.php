<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\prestamo;
use Livewire\Component;
use function number_format;

class CrearPrestamo extends Component
{
    public $open = false;
    public $clienteDni;
    public $clienteNombres;
    public $clienteEncontrado = false;
    public $producto;
    public $opcionesProducto = ['Revisión Técnica Vehicular', 'Revisión Anual de gas', 'Mantenimiento de tu vehiculó', 'Soat ', 'Otro'];
    public $monto;
    public $interes;
    public $cuotas;
    public $fpago;
    public $fecha;
    public $vcuota;
    public $vinteres;
    public $mtotal;
    public $calculosRealizados = false;

    protected $rules = [
            'clienteDni' => 'required',
            'clienteNombres' => 'required',
            'producto' => 'required',
            'monto' => 'required',
            'interes' => 'required',
            'cuotas' => 'required',
            'fpago' => 'required',
            'fecha' => 'required', 
            'vcuota' => 'required',      
            'vinteres' => 'required',      
            'mtotal' => 'required',      

    ];


    public function render()
    {
        return view('livewire.crear-prestamo');
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
            'fpago' => 'required',
            'fecha' => 'required|date',
        ]);
        // Conversión de la tasa de interés a decimal (ejemplo: 5% -> 0.05)
        $tasaInteres = $this->interes / 100;
        // Cálculo de la cuota
        $montoPrestamo = $this->monto;
        $numeroCuotas = $this->cuotas;
        $tasaInteresMensual = $tasaInteres / 12;
        $cuota = ($montoPrestamo * $tasaInteresMensual) / (1 - pow(1 + $tasaInteresMensual, -$numeroCuotas));
        // Cálculo del valor de interés total
        $valorInteresTotal = ($cuota * $numeroCuotas) - $montoPrestamo;
        // Cálculo del monto total
        $montoTotal = $montoPrestamo + $valorInteresTotal;
        // Redondear los resultados a 2 decimales
        $cuota = number_format($cuota, 2);
        $valorInteresTotal = number_format($valorInteresTotal, 2);
        $montoTotal = number_format($montoTotal, 2);
        // Actualización de las propiedades con los resultados
        $this->vcuota = $cuota;
        $this->vinteres = $valorInteresTotal;
        $this->mtotal = $montoTotal;
        // Marcar los cálculos como realizados
        $this->calculosRealizados = true;
    }

    public function crearPrestamo()
    {
        // Validaciones de entrada (puedes personalizar estas validaciones según tus requisitos)
        $this->validate([
            'clienteDni' => 'required|exists:clientes,dni',
            'producto' => 'required',
            'monto' => 'required|numeric|min:1',
            'interes' => 'required|numeric|min:0',
            'cuotas' => 'required|integer|min:1',
            'fpago' => 'required',
            'fecha' => 'required|date',
        ]);
        // Obtener el ID del cliente usando el DNI
        $cliente = Cliente::where('dni', $this->clienteDni)->first();
        // Crear un nuevo registro de préstamo en la base de datos
        prestamo::create([
            'idCliente' => $cliente->id,
            'producto' => $this->producto,
            'monto' => $this->monto,
            'interes' => $this->interes,
            'cuotas' => $this->cuotas,
            'fpago' => $this->fpago,
            'fecha' => $this->fecha,
            'vcuota' => $this->vcuota,     
            'vinteres' => $this->vinteres,    
            'mtotal' => $this->mtotal,
            // Otros campos del préstamo si los tienes
        ]);

        // Reiniciar los campos del formulario
        $this->resetForm();
        // Mostrar un mensaje de éxito (puedes personalizar este mensaje)
        session()->flash('message', 'Préstamo creado con éxito.');
        // Cerrar el modal
        $this->open = false;
    }

    public function resetForm()
    {
        $this->open = false;
        $this->clienteDni = '';
        $this->clienteNombres = '';
        $this->clienteEncontrado = false;
        $this->producto = '';
        $this->monto = '';
        $this->interes = '';
        $this->cuotas = '';
        $this->fpago = '';
        $this->fecha = '';
        $this->vcuota = '';
        $this->vinteres = '';
        $this->mtotal = '';
        $this->calculosRealizados = false;
    }
}

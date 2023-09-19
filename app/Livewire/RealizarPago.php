<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\Cobranza;
use App\Models\prestamo;
use Livewire\Component;
use Carbon\Carbon;

class RealizarPago extends Component
{
    public $open = false;
    public $dni;
    public $clienteEncontrado = false;
    public $clienteNombres;
    public $monto;
    public $formaPago;
    public $producto;
    public $cuotas = [];
    public $seleccionarCuota = [];
    public $mtotal;
    public $vcuota;
    public $fechaInicioCuota;
    public $totalAPagar = 0;
    public $estado = []; // Agrega un arreglo para los estados
    public $fechapago; // Agrega una propiedad para la fecha de pago
    public $id; // Agrega una propiedad para el id del préstamo

    public function render()
    {
        return view('livewire.realizar-pago');
    }

    public function buscarCliente()
    {
        $cliente = Cliente::where('dni', $this->dni)->first();

        if ($cliente) {
            $this->clienteNombres = $cliente->nombre . ' ' . $cliente->apellido;

            // Obtener detalles de préstamo
            $prestamo = prestamo::where('idCliente', $cliente->id)->first();
            if ($prestamo) {
                $this->id = $prestamo->id;
                $this->monto = $prestamo->monto;
                // Obtener la forma de pago
                $formaPago = $prestamo->formaPago;
                $this->formaPago = $formaPago->nombre;
                //Obtener el produtco
                $producto = $prestamo->producto;
                $this->producto = $producto->nombre;
                // También puedes calcular el monto total aquí si es necesario
                $this->mtotal = $prestamo->mtotal;
                $this->vcuota = $prestamo->vcuota;
                // Obtener las cuotas si es necesario
                $this->cuotas = json_decode($prestamo->cuotas, true);
                $this->fechaInicioCuota = Carbon::parse($prestamo->fecha);
                // Inicializa los estados
                $this->estado = array_fill(1, $prestamo->cuotas, 'Pendiente');
            }

            $this->clienteEncontrado = true;
        } else {
            $this->clienteNombres = '';
            $this->clienteEncontrado = false;
        }
    }

    public function calcularTotal($vcuota)
    {
        $this->totalAPagar = 0;

        foreach ($this->seleccionarCuota as $cuotaSeleccionada) {
            $this->totalAPagar += $vcuota * $cuotaSeleccionada;
        }
    }
    public function registrarPago()
    {
        $this->validate([
            'dni' => 'required',
            'clienteNombres' => 'required',
            'producto' => 'required',
            'formaPago' => 'required',
            'monto' => 'required|numeric',
            'mtotal' => 'required|numeric',
            'seleccionarCuota.*' => 'required|boolean',
            'vcuota' => 'required|numeric',
            'totalAPagar' => 'required|numeric',
        ]);
        Cobranza::create([
            'idPrestamos' => $this->id,
            'estado' => json_encode($this->estado), // Debe ser $this->estado en lugar de $this->estados
            'fechapago' => $this->fechaInicioCuota,
        ]);
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->open = false;
        $this->dni = '';
        $this->clienteEncontrado = false;
        $this->clienteNombres = '';
        $this->monto = '';
        $this->formaPago = '';
        $this->producto = '';
        $this->cuotas = [];
        $this->seleccionarCuota = [];
        $this->mtotal = '';
        $this->vcuota = '';
        $this->fechaInicioCuota = '';
        $this->totalAPagar = '';
        $this->estado = [];
        $this->fechapago = '';
        $this->id = '';
    }
}

<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\prestamo;
use Livewire\Component;

class RealizarPago extends Component
{
    public $open = true;
    public $dni;
    public $clienteEncontrado = false;
    public $clienteNombres;
    public $monto;
    public $formaPago;
    public $cuotas = [];
    public $seleccionarCuota = [];
    public $numeroCuotas = 0;
    public $mtotal;
    public$vcuota;


    public function render()
    {
        return view('livewire.realizar-pago');
    }

    /*public function buscarCliente()
    {
        $cliente = Cliente::where('dni', $this->dni)->first();

        if ($cliente) {
            $this->clienteNombres = $cliente->nombre . ' ' . $cliente->apellido;
            $this->clienteEncontrado = true;           
            
        } else {
            $this->clienteNombres = '';
            $this->clienteEncontrado = false;
        }
    }*/
    public function buscarCliente()
    {
        $cliente = Cliente::where('dni', $this->dni)->first();

        if ($cliente) {
            $this->clienteNombres = $cliente->nombre . ' ' . $cliente->apellido;

            // Obtener detalles de préstamo
            $prestamo = prestamo::where('idCliente', $cliente->id)->first();
            if ($prestamo) {
                $this->monto = $prestamo->monto;
                // Obtener la forma de pago
                $formaPago = $prestamo->formaPago;
                $this->formaPago = $formaPago->nombre; 
                // También puedes calcular el monto total aquí si es necesario
                $this->mtotal = $prestamo->mtotal;
                $this->vcuota = $prestamo->vcuota;
                // Obtener las cuotas si es necesario
                $this->cuotas = $prestamo->cuotas;
            }

            $this->clienteEncontrado = true;
        } else {
            $this->clienteNombres = '';
            $this->clienteEncontrado = false;
        }
    }

    public function actualizarSeleccion()
    {
        // Actualizar la selección de cuotas
        // ...
    }
    public function registrarPago()
    {
        // Lógica para registrar el pago
        // ...
    }
    public function resetForm()
    {
        $this->open = false;
    }
}

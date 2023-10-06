<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\prestamo;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Carbon\Carbon;
use PDF;


class Prestamos extends Component
{
    public $idCliente, $idProducto, $idfPago, $monto, $interes, $cuotas, $fecha, $vcuota, $vinteres, $mtotal;
    public $search = '';
    public $editando;
    public $prestamoSeleccionado;
    public $cuotas2 = [];
    public $fechaInicioCuota;

    public $prestamo;

    use WithPagination;
    #[On('render')]

    public function render()
    {
        $prestamos = Prestamo::with('cliente', 'producto')
            ->where(function ($query) {
                $query->whereHas('cliente', function ($query) {
                    $query->where('nombre', 'LIKE', '%' . $this->search . '%');
                })
                    ->orWhereHas('producto', function ($query) {
                        $query->where('nombre', 'LIKE', '%' . $this->search . '%');
                    });
            })
            ->paginate(10);

        return view('livewire.prestamos', compact('prestamos'));
    }

    public function verPago($id)
    {
        $this->prestamoSeleccionado = Prestamo::find($id);
        $this->dispatch('mostrarPrestamo', $id);
        $this->editando = true;
    }

    /*public function cargarDetallesPrestamo($id)
    {
        $this->prestamoSeleccionado = Prestamo::with('cuotas')->find($id);
        $this->editando = true;
    }*/


    public function delete($id)
    {
        $this->dispatch('delete', json_encode($id));
    }

    #[On('destroy')]

    public function destroy($kate)
    {
        //dd($kate);
        prestamo::find($kate)->delete();
        $this->render();
    }

    public function imprimirReporte($id)
    {
    }
}

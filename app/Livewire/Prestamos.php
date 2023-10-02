<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\prestamo;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Prestamos extends Component
{
    public $idCliente, $idProducto, $idfPago, $monto, $interes, $cuotas, $fecha, $vcuota, $vinteres, $mtotal;
    public $search = '';
    use WithPagination;
    #[On('render')]

    /*public function render()
    {
        return view('livewire.prestamos');
    }*/

    /*public function render()
    {
        $prestamos = prestamo::with('cliente')->get();

        return view('livewire.prestamos', compact('prestamos'));
    }*/
    public function render()
    {
        
        $prestamos = prestamo::with('cliente')
            ->whereHas('cliente', function ($query) {
                $query->where('nombre', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('dni', 'LIKE', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.prestamos', compact('prestamos'));
    }

    
    
}

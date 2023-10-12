<?php

namespace App\Livewire;

use App\Models\Taller;
use Livewire\Component;
use Livewire\WithPagination;

use Livewire\Attributes\On;

class Talleres extends Component
{

    public $nombre, $direccion, $ruc, $representante;
    public $tallerid;
    public $search = "";
    public $editando;
    use WithPagination;
    #[On('render')]

    public function render()
    {
        $talleres = Taller::where(function ($query) {
            $query->where('nombre', 'LIKE', '%' . $this->search . '%')
                ->orWhere('direccion', 'LIKE', '%' . $this->search . '%');
        })->paginate(10);
        return view('livewire.talleres', compact('talleres'));
    }

    public function delete($id)
    {
        $this->dispatch('delete', json_encode($id));
    }

    #[On('destroy')]
    public function destroy($kate)
    {
        Taller::find($kate)->delete();
        $this->dispatch('render');
    }

    public function edit($id)
    {
        $this->resetForm();
        $taller = Taller::find($id);

        if ($taller) {
            $this->tallerid = $taller->id;
            $this->nombre = $taller->nombre;
            $this->direccion = $taller->direccion;
            $this->ruc = $taller->ruc;
            $this->representante = $taller->representante;
            $this->editando = true;
        }
    }

    public function actualizar()
    {
        $this->validate([
            "nombre" => "required",
            "direccion" => "required",
            "ruc" => "required",
            "representante" => "required",
        ]);

        if ($this->tallerid) {
            $taller = Taller::find($this->tallerid);

            if ($taller) {
                $taller->update([
                    'nombre' => $this->nombre,
                    'direccion' => $this->direccion,
                    'ruc' => $this->ruc,
                    'representante' => $this->representante,
                ]);
                $this->resetForm();
                $this->editando = false;
                $this->dispatch('render');
                $this->dispatch('CustomAlert', ['titulo' => 'Bien Hecho', 'mensaje' => 'El Taller se actualizo correctamente', 'icono' => 'success']);
            }
        }
    }

    private function resetForm()
    {
        $this->nombre = '';
        $this->direccion = '';
        $this->ruc = '';
        $this->representante = '';
        $this->tallerid = null;
    }
}

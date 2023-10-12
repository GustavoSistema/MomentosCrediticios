<?php

namespace App\Livewire;

use App\Models\Producto;
use Livewire\Component;

use Livewire\WithPagination;
use Livewire\Attributes\On;

class Productos extends Component
{
    public $nombre;
    public $productoid;
    public $search = "";
    public $editando;
    use WithPagination;
    #[On('render')]

    
    public function render()
    {
        $productos = Producto::where(function ($query) {
            $query->where('nombre', 'LIKE', '%' . $this->search . '%');
        })->paginate(10);
        return view('livewire.productos', compact('productos'));
    }

    public function delete($id)
    {
        $this->dispatch('delete', json_encode($id));
    }

    #[On('destroy')]
    public function destroy($kate)
    {
        Producto::find($kate)->delete();
        $this->dispatch('render');
    }

    public function edit($id)
    {
        $this->resetForm();
        $producto = Producto::find($id);

        if ($producto) {
            $this->productoid = $producto->id;
            $this->nombre = $producto->nombre;
            $this->editando = true;
        }
    }

    public function actualizar()
    {
        $this->validate([
            "nombre" => "required",
        ]);

        if ($this->productoid) {
            $producto = Producto::find($this->productoid);

            if ($producto) {
                $producto->update([
                    'nombre' => $this->nombre,
                ]);
                $this->resetForm();
                $this->editando = false;
                $this->dispatch('render');
                $this->dispatch('CustomAlert', ['titulo' => 'Bien Hecho', 'mensaje' => 'El Producto se actualizo correctamente', 'icono' => 'success']);
            }
        }
    }

    private function resetForm()
    {
        $this->nombre = '';
        $this->productoid = null;
    }

}

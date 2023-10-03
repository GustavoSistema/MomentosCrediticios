<div>
    <button wire:click="$set('open',true)" class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
        Crear Nuevo Cliente
    </button>
    <x-dialog-modal wire:model="open" wire:loading.attr="disabled">
        <x-slot name="title" class="font-bold">
            <h1 class="text-xl font-bold"><i class="fa-solid fa-plus text-white"></i> &nbsp;Nuevo Cliente</h1>
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Nombre:" />
                <x-input wire:model="nombre" type="text" class="w-full" />
                <x-input-error for="nombre" />
            </div>
            <div class="mb-4">
                <x-label value="Apellido:" />
                <x-input wire:model="apellido" type="text" class="w-full" />
                <x-input-error for="apellido" />
            </div>
            <div class="mb-4">
                <x-label value="Dni:" />
                <x-input wire:model="dni" type="text" class="w-full" />
                <x-input-error for="dni" />
            </div>
            <div class="mb-4">
                <x-label value="Género:" for="genero" />
                <select wire:model="genero"
                    class="bg-gray-50 mx-2 border-indigo-500 rounded-md outline-none ml-1 block w-full ">
                    <option value="">Selecciona un género</option>
                    @foreach ($opcionesGenero as $opcion)
                        <option value="{{ $opcion }}">{{ $opcion }}</option>
                    @endforeach
                </select>
                @error('genero')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4 flex">
                <div class="w-1/2">
                    <x-label value="Celular:" />
                    <x-input wire:model="celular" type="number" class="w-full" />
                    <x-input-error for="celular" />
                </div>
                <div class="w-1/2">
                    <x-label value="Correo:" />
                    <x-input wire:model="correo" type="email" class="w-full" />
                    <x-input-error for="correo" />
                </div>
            </div>
            <div class="mb-4">
                <x-label value="Direccion:" />
                <x-input wire:model="direccion" type="text" class="w-full" />
                <x-input-error for="direccion" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="resetForm" class="mx-2">
                Cancelar
            </x-secondary-button>
            <x-button wire:click="crearCliente" wire:loading.attr="disabled" wire:target="crearCliente"
                class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
                Guardar
            </x-button>
        </x-slot>
    </x-dialog-modal>

</div>

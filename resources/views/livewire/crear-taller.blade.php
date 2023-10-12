<div>
    <button wire:click="$set('open',true)" class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
        Crear Nuevo Taller
    </button>
    <x-dialog-modal wire:model="open" wire:loading.attr="disabled">
        <x-slot name="title" class="font-bold">
            <h1 class="text-xl font-bold"><i class="fa-solid fa-plus text-white"></i> &nbsp;Nuevo Taller</h1>
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Nombre:" />
                <x-input wire:model="nombre" type="text" class="w-full" />
                <x-input-error for="nombre" />
            </div>
            <div class="mb-4">
                <x-label value="Direccion:" />
                <x-input wire:model="direccion" type="text" class="w-full" />
                <x-input-error for="direccion" />
            </div>
            <div class="mb-4">
                <x-label value="RUC :" />
                <x-input wire:model="ruc" type="text" class="w-full" />
                <x-input-error for="ruc" />
            </div>
            <div class="mb-4">
                <x-label value="Representante:" />
                <x-input wire:model="representante" type="text" class="w-full" />
                <x-input-error for="representante" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="resetForm" class="mx-2">
                Cancelar
            </x-secondary-button>
            <x-button wire:click="crearTaller" wire:loading.attr="disabled" wire:target="crearTaller"
                class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
                Guardar
            </x-button>
        </x-slot>
    </x-dialog-modal>

</div>

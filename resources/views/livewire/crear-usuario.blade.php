<div>
    <button wire:click="$set('open',true)" class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
        Crear Nuevo Usuario
    </button>

    <x-dialog-modal wire:model="open" wire:loading.attr="disabled">
        <x-slot name="title" class="font-bold">
            <h1 class="text-xl font-bold"><i class="fa-solid fa-plus text-white"></i> &nbsp;Nuevo Usuario</h1>
        </x-slot>

        <x-slot name="content">
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="" class="mx-2">
                Cancelar
            </x-secondary-button>
            <x-button wire:click="" wire:loading.attr="disabled" wire:target="">
                Guardar
            </x-button>

        </x-slot>

    </x-dialog-modal>
</div>

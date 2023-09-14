<div>
    <button wire:click="$set('open',true)" class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
         Realizar Pago
    </button>
    <x-dialog-modal wire:model="open" wire:loading.attr="disabled">
        <x-slot name="title" class="font-bold">
            <h1 class="text-xl font-bold"><i class="fa-solid fa-plus text-white"></i> &nbsp;Realizar Pago</h1>
        </x-slot>
        <x-slot name="content">
            <!-- Búsqueda por DNI -->
            <div class="mb-4 flex">
                <x-label value="Buscar Cliente por DNI:" class="flex-shrink-0 w-1/4" />
                <x-input wire:model="dni" type="text" id="dni" class="w-full mr-2" />
                <button wire:click="buscarCliente" class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
                    Buscar
                </button>
                <x-input-error for="dni" />
            </div>
             <!-- Datos del Cliente -->
            @if ($clienteEncontrado)
                <p>Nombre Completo: {{ $clienteNombres }}</p>
                <p>Monto: {{ $monto }}</p>
                <p>Forma de Pago: {{ $formaPago }}</p>
                <p>Monto Total: {{ $mtotal }}</p>
                <p># Cuotas: {{ $cuotas }}</p>                
                <p>Valor * Cuota: {{ $vcuota }}</p>
            @endif

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="resetForm" class="mx-2">
                Cancelar
            </x-secondary-button>
            <x-button wire:click="registrarPago" wire:loading.attr="disabled" wire:target="registrarPago"
                class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
                Guardar
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>

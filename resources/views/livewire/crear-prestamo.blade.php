<div>
    <button wire:click="$set('open',true)" class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
        Crear Nuevo Prestamo
    </button>
    <x-dialog-modal wire:model="open" wire:loading.attr="disabled">
        <x-slot name="title" class="font-bold">
            <h1 class="text-xl font-bold"><i class="fa-solid fa-plus text-white"></i> &nbsp;Nuevo Prestamo</h1>
        </x-slot>
        <x-slot name="content">
            <!-- Búsqueda por DNI -->
            <div class="mb-4 flex">
                <x-label value="Buscar Cliente por DNI:" class="flex-shrink-0 w-1/4" />
                <x-input wire:model="clienteDni" type="text" id="cliente_dni" class="w-full mr-2" />
                <button wire:click="buscarCliente" class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
                    Buscar
                </button>
                <x-input-error for="cliente_dni" />
            </div>
            <!-- Datos del Cliente -->
            @if ($clienteEncontrado)
                <div class="mb-4">
                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <x-label for="cliente_dni" value="DNI del Cliente:" />
                            <x-input wire:model="clienteDni" type="text" id="cliente_dni" class="w-full" readonly />
                        </div>
                        <div class="w-1/2">
                            <x-label for="cliente_nombres" value="Nombres Completos:" />
                            <x-input wire:model="clienteNombres" type="text" id="cliente_nombres" class="w-full"
                                readonly />
                        </div>
                    </div>
                </div>
            @else
                <p>El cliente no existe.</p>
            @endif

            <!-- Formulario de Préstamo -->
            <div class="mb-4">
                <x-label value="Producto:" for="producto"/>
                <select wire:model="producto" class="bg-gray-50 mx-2 border-indigo-500 rounded-md outline-none ml-1 block w-full ">
                    <option value="">Selecciona un Producto</option>
                    @foreach ($opcionesProducto as $opcion)
                        <option value="{{ $opcion }}">{{ $opcion }}</option>
                    @endforeach
                </select>
                @error('genero') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="mb-4">
                <x-label for="monto" value="Monto del Producto:" />
                <x-input wire:model="monto" type="text" id="monto" class="w-full" />
            </div>
            <div class="mb-4">
                <x-label for="interes" value="Tasa de Interés %:" />
                <x-input wire:model="interes" type="text" id="interes" class="w-full" />
            </div>
            <div class="mb-4">
                <x-label for="cuotas" value="Número de Cuotas:" />
                <x-input wire:model="cuotas" type="text" id="cuotas" class="w-full" />
            </div>
            <div class="mb-4">
                <x-label for="fpago" value="Forma de Pago:" />
                <x-input wire:model="fpago" type="text" id="fpago" class="w-full" />
            </div>
            <div class="mb-4">
                <x-label for="fecha" value="Fecha de Inicio:" />
                <x-input wire:model="fecha" type="date" id="fecha" class="w-full" />
            </div>
            <!-- Botón Calcular -->
            <div class="text-center mb-4">
                <button wire:click="calcular" wire:loading.attr="disabled"
                    class="bg-green-500 text-white py-2 px-4 rounded-md shadow-md mx-auto">
                    Calcular
                </button>
            </div>

            <!-- Resultados de Cálculos -->
            @if ($calculosRealizados)
                <div class="mb-4 flex">
                    <div class="w-1/3">
                        <x-label for="vcuota" value="Valor de Cuota:" />
                        <x-input wire:model="vcuota" type="text" id="vcuota" readonly />
                    </div>
                    <div class="w-1/3">
                        <x-label for="vinteres" value="Valor de Interés:" />
                        <x-input wire:model="vinteres" type="text" id="vinteres" readonly />
                    </div>
                    <div class="w-1/3">
                        <x-label for="mtotal" value="Monto Total:" />
                        <x-input wire:model="mtotal" type="text" id="mtotal" readonly />
                    </div>
                </div>
            @endif

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="resetForm" class="mx-2">
                Cancelar
            </x-secondary-button>
            <x-button wire:click="crearPrestamo" wire:loading.attr="disabled" wire:target="crearPrestamo"
                class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
                Guardar
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>

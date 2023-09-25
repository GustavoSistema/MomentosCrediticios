<div>
    <button wire:click="$set('open',true)" class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
        Crear Evaluación
    </button>
    <x-dialog-modal wire:model="open" wire:loading.attr="disabled">
        <x-slot name="title" class="font-bold">
            <h1 class="text-xl font-bold"><i class="fa-solid fa-plus text-white"></i> &nbsp;Crear Evaluación</h1>
        </x-slot>

        <x-slot name="content">
            <!-- Selector de Taller -->
            <div class="mb-4">
                <x-label value="Taller:" for="taller" />
                <select wire:model="taller"
                    class="bg-gray-50 mx-2 border-indigo-500 rounded-md outline-none ml-1 block w-full ">
                    <option value="">Selecciona un taller</option>
                    @foreach ($talleres as $taller)
                        <option value="{{ $taller->id }}">{{ $taller->nombre }}</option>
                    @endforeach
                </select>
                @error('taller')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex space-x-2">
                <div class="w-1/2">
                    <x-label value="Nombres:" />
                    <x-input wire:model="nomcliente" type="text" id="nomcliente" class="w-full" />
                    <x-input-error for="nomcliente" />
                </div>
                <div class="w-1/2">
                    <x-label value="Apellidos:" />
                    <x-input wire:model="apecliente" type="text" id="apecliente" class="w-full" />
                    <x-input-error for="apecliente" />
                </div>
            </div>

            <div class="mb-4">
                <x-label value="DNI:" />
                <x-input wire:model="dnicliente" type="text" id="dnicliente" class="w-full" />
                <x-input-error for="dnicliente" />
            </div>
            <div class="mb-4">
                <x-label value="Celular:" />
                <x-input wire:model="celular" type="text" id="celular" class="w-full" />
                <x-input-error for="celular" />
            </div>
            <div class="mb-4">
                <x-label value="Correo:" />
                <x-input wire:model="email" type="email" id="email" class="w-full" />
                <x-input-error for="email" />
            </div>
            <div class="mb-4">
                <x-label value="Fecha:" />
                <x-input wire:model="fecha" type="date" id="fecha" class="w-full" />
                <x-input-error for="fecha" />
            </div>
            <div class="mb-4">
                <x-label value="Estado:" for="estado" />
                <x-input value="Por Revisar" type="text" id="estado" class="w-full" readonly />
                <!-- Elimina el código del select -->
                 @error('estado') <span class="text-red-500">{{ $message }} @enderror
            </div>
            <div class="mb-4">
                <x-label value="Subir Documentos:" />
                <x-input wire:model="documento" type="file" id="{{ $documento }}" class="w-full" />
                <x-input-error for="documento" />
            </div>
            <div class="mb-4">
                <x-label value="Documento PDF:" />
                @if ($documento)
                    <a href="{{ asset($documento) }}" target="_blank">Ver PDF</a>
                    <!-- Opcional: Si deseas mostrar el PDF directamente en la página -->
                    <embed src="{{ $documento }}" type="application/pdf" width="100%" height="500px" />
                @else
                    <p>No se ha cargado ningún PDF.</p>
                @endif
            </div>
                      
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="resetForm" class="mx-2">
                Cancelar
            </x-secondary-button>
            <x-button wire:click="crearEvaluacion" wire:loading.attr="disabled" wire:target="crearEvaluacion"
                class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
                Guardar
            </x-button>
        </x-slot>
    </x-dialog-modal>

</div>

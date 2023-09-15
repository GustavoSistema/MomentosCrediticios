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
                <div class="flex space-x-4">
                    <div class="w-1/3">
                        <x-label for="clienteNombres" value="Nombre Completo:" />
                        <x-input wire:model="clienteNombres" type="text" id="clienteNombres" class="w-full" />
                    </div>
                    <div class="w-1/3">
                        <x-label for="producto" value="Producto:" />
                        <x-input wire:model="producto" type="text" id="producto" class="w-full" />
                    </div>
                    <div class="w-1/3">
                        <x-label for="formaPago" value="Forma de Pago:" />
                        <x-input wire:model="formaPago" type="text" id="formaPago" class="w-full" />
                    </div>
                </div>
                <div class="mb-4 flex">
                    <div class="w-1/4">
                        <x-label for="monto" value="Monto Prestado:" />
                        <x-input wire:model="monto" type="text" id="monto" class="w-full" />
                    </div>
                    <div class="w-1/4">
                        <x-label for="cuotas" value="Nª Cuotas:" />
                        <x-input wire:model="cuotas" type="text" id="cuotas" class="w-full" />
                    </div>
                    <div class="w-1/4">
                        <x-label for="vcuota" value="Pago x Cuota:" />
                        <x-input wire:model="vcuota" type="text" id="vcuota" class="w-full" />
                    </div>
                    <div class="w-1/4">
                        <x-label for="mtotal" value="Total:" />
                        <x-input wire:model="mtotal" type="text" id="mtotal" class="w-full" />
                    </div>
                </div>
            @endif
            @php
                $totalPrestamo = $mtotal; // Usar el monto total del préstamo
                $numCuotas = $cuotas; // Usar el número de c    uotas
                $valorCuota = $vcuota; // Usar el valor de cuota
                $fechaInicio = Carbon\Carbon::parse($fechapago); // Usar la fecha de inicio del préstamo
                $formaPago = $formaPago; // Usar la forma de pago (Diario, Semanal, Quincenal)
            @endphp
            @if ($clienteEncontrado)
                <table class="w-full">
                    <thead>
                        <tr>
                            <th><button type="button" class="btn btn-link check-all">Seleccionar todos</button></th>
                            <th>Cuota</th>
                            <th>Fecha de Pago</th>
                            <th>Pago x Cuota</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>

                        @for ($i = 1; $i <= $numCuotas; $i++)
                            <tr>
                                <td><input wire:model="seleccionarCuota.{{ $i }}" type="checkbox"></td>
                                <td>{{ $i }}</td>
                                <td>{{ $fechaInicio->format('Y-m-d') }}</td>
                                <td>{{ $vcuota }}</td>
                                <td>
                                    <select wire:model="estados.{{ $i }}">
                                        <option value="Pendiente">Pendiente</option>
                                        <option value="Cancelado">Cancelado</option>
                                    </select>
                                </td>
                            </tr>
                            @if ($formaPago === 'Diario')
                                {{ $fechaInicio->addDay() }}
                            @elseif ($formaPago === 'Semanal')
                                {{ $fechaInicio->addWeek() }}
                            @elseif ($formaPago === 'Quincenal')
                                {{ $fechaInicio->addWeeks(2) }}
                            @endif
                        @endfor
                    </tbody>
                </table>
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

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
                    <div class="w-1/2">
                        <x-label for="clienteNombres" value="Nombre Completo:" />
                        <x-input wire:model="clienteNombres" type="text" id="clienteNombres" class="w-full"
                            readonly />
                    </div>
                    <div class="w-1/2">
                        <x-label for="producto" value="Producto:" />
                        <x-input wire:model="producto" type="text" id="producto" class="w-full" readonly />
                    </div>
                    <!--
                    <div class="w-1/3">
                        <x-label for="formaPago" value="Forma de Pago:" />
                        <x-input wire:model="formaPago" type="text" id="formaPago" class="w-full" />
                    </div>
                    -->
                </div>
                <div class="mb-4 flex">
                    <div class="w-1/3">
                        <x-label for="formaPago" value="Forma de Pago:" />
                        <x-input wire:model="formaPago" type="text" id="formaPago" class="w-full" readonly />
                    </div>
                    <div class="w-1/3">
                        <x-label for="monto" value="Monto Prestado:" />
                        <x-input wire:model="monto" type="text" id="monto" class="w-full" readonly />
                    </div>
                    <!--
                    <div class="w-1/4">
                        <x-label for="cuotas" value="Nª Cuotas:" />
                        <x-input wire:model="cuotas" type="text" id="cuotas" class="w-full" />
                    </div>
                    <div class="w-1/4">
                        <x-label for="vcuota" value="Pago x Cuota:" />
                        <x-input wire:model="vcuota" type="text" id="vcuota" class="w-full" />
                    </div>
                    -->
                    <div class="w-1/3">
                        <x-label for="mtotal" value="Total:" />
                        <x-input wire:model="mtotal" type="text" id="mtotal" class="w-full" readonly />
                    </div>
                </div>

                @if ($clienteEncontrado)
                    <table class="w-full whitespace-nowrap">
                        <thead class="bg-slate-600 border-b font-bold text-white">
                            <tr>
                                <th scope="col"
                                    class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">#</button>
                                </th>
                                <th scope="col"
                                    class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">Cuota</th>
                                <th scope="col"
                                    class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">Fecha de
                                    Pago</th>
                                <th scope="col"
                                    class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">Pago x
                                    Cuota</th>
                                <th scope="col"
                                    class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $fechaIteracion = clone $this->fechaInicioCuota; // Clonar la fecha original
                            @endphp
                            @for ($i = 1; $i <= $this->cuotas; $i++)
                                <tr>
                                    <td class="pl-2">
                                        <div class="flex items-center #omente_center">
                                            <p class="text-sm font-medium leading-none text-gray-600 mr-2">
                                                <input wire:model="seleccionarCuota.{{ $i }}"
                                                    value="{{ $i }}" type="checkbox"
                                                    wire:change="calcularTotal({{ $this->vcuota }})">

                                            </p>
                                        </div>
                                    </td>
                                    <td class="pl-2">
                                        <div class="flex items-center">
                                            <p class="text-sm font-medium leading-none text-gray-600 mr-2">
                                                {{ $i }}
                                            </p>
                                        </div>
                                    </td>
                                    <td class="pl-2">
                                        <div class="flex items-center">
                                            <p class="text-sm font-medium leading-none text-gray-600 mr-2">
                                                @if ($this->formaPago === 'Diario')
                                                    {{ $fechaIteracion->addDay()->toDateString() }}
                                                @elseif ($this->formaPago === 'Semanal')
                                                    {{ $fechaIteracion->addWeek()->toDateString() }}
                                                @elseif ($this->formaPago === 'Quincenal')
                                                    {{ $fechaIteracion->addDay(15)->toDateString() }}
                                                @elseif ($this->formaPago === 'Mensual')
                                                    {{ $fechaIteracion->addMonthsNoOverflow()->toDateString() }}
                                                @endif
                                            </p>
                                        </div>
                                    </td>
                                    <td class="pl-2">
                                        <div class="flex items-center">
                                            <p class="text-sm font-medium leading-none text-gray-600 mr-2">
                                                {{ $this->vcuota }}
                                            </p>
                                        </div>
                                    </td>
                                    <td class="pl-2">
                                        <div class="flex items-center">
                                            <p class="text-sm font-medium leading-none text-gray-600 mr-2">
                                                <select wire:model="estado.{{ $i }}">
                                                    <option value="Pendiente"
                                                        @if ($this->estado[$i] === 'Pendiente') selected @endif>Pendiente
                                                    </option>
                                                    <option value="Cancelado"
                                                        @if ($this->estado[$i] === 'Cancelado') selected @endif>Cancelado
                                                    </option>
                                                </select>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                    <div class="w-full">
                        <x-label for="totalAPagar" value="Total a Pagar:" />
                        <x-input wire:model="totalAPagar" type="text" id="totalAPagar" class="w-full" readonly />
                    </div>
                @endif

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

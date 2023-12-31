<div>
    <div class="mx-8 rounded-md mb-4">
        <div class="text-xl font-semibold mt-8">
            <h3 style="font-size: 1.5rem; font-weight: bold;">REGISTRO DE PRESTAMOS</h3>
        </div>
        <div class="mt-2">
            <div class="flex bg-gray-200 items-center p-2 rounded-md mb-4">
                <span>Buscar: </span>
                <input type="text" wire:model.live="search"
                    class="bg-gray-50 mx-2 border-indigo-500 rounded-md outline-none ml-1 w-1/2 truncate">
                <div class="ml-auto">
                    @livewire('crear-prestamo')
                </div>
            </div>
        </div>
    </div>
    <div class="mx-8 rounded-md">
        @if (isset($prestamos) && count($prestamos) > 0)
            <table class="w-full whitespace-nowrap">
                <thead class="bg-slate-600 border-b font-bold text-white">
                    <tr>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            #</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Cliente</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Producto</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Monto Credito</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Monto Interés</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Monto Total</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Método</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Fecha</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prestamos as $prestamo)
                        <tr tabindex="0"
                            class="focus:outline-none h-16 border border-slate-300 rounded hover:bg-gray-200">
                            <td class="pl-5">
                                <div class="flex items-center">
                                    <div
                                        class="bg-indigo-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative text-indigo-900">
                                        {{ $prestamo->id }}
                                    </div>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p class="text-sm font-medium leading-none text-gray-600 mr-2">
                                        {{ $prestamo->cliente->nombre }} {{ $prestamo->cliente->apellido }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p class="text-sm leading-none text-gray-600 ml-2 p-2 bg-green-200 rounded-full">
                                        {{ $prestamo->producto->nombre }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p
                                        class="bg-indigo-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative text-indigo-900">
                                        {{ $prestamo->monto }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p
                                        class="bg-indigo-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative text-indigo-900">
                                        {{ $prestamo->vinteres }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p
                                        class="bg-indigo-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative text-indigo-900">
                                        {{ $prestamo->mtotal }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p class="text-sm font-semibold  text-gray-600 p-1 bg-orange-100 rounded-full">
                                        {{ $prestamo->formaPago->nombre }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p class="text-sm font-medium leading-none text-gray-600 mr-2">
                                        {{ $prestamo->fecha }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex space-x-2">
                                    <a wire:click="verPago('{{ $prestamo->id }}')"
                                        class="group py-4 px-4 text-center rounded-md bg-indigo-300 font-bold text-white cursor-pointer hover:bg-indigo-400  hover:animate-pulse">
                                        <i class="far fa-eye"></i>
                                        <span
                                            class="group-hover:opacity-100  bg-gray-800 px-1 text-sm text-gray-100 rounded-md absolute left-1/2-translate-x-1/2 translate-y-full opacity-0 m-4 mx-auto">
                                            Ver Prestamo
                                        </span>
                                    </a>
                                    <a wire:click="delete({{ $prestamo->id }})"
                                        class="group py-4 px-4 text-center rounded-md bg-red-300 font-bold text-white cursor-pointer hover:bg-red-400  hover:animate-pulse">
                                        <i class="fas fa-trash"></i>
                                        <span
                                            class="group-hover:opacity-100 transition-opacity bg-gray-800 px-1 text-sm text-gray-100 rounded-md absolute left-1/2-translate-x-1/2 translate-y-full opacity-0 m-4 mx-auto">
                                            Eliminar
                                        </span>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $prestamos->links() }}
        @endif
    </div>

    {{-- MODAL VER PRÉSTAMO --}}
    <x-dialog-modal wire:model="editando" wire:loading.attr="disabled">
        <x-slot name="title" class="font-bold text-2xl mb-4 flex justify-between items-center">
            @if ($prestamoSeleccionado)
                <button id="printModalButton" wire:click="imprimirReporte('{{ $prestamoSeleccionado->id }}')"
                    class="flex items-center ml-auto">
                    <i class="fas fa-print text-indigo-500"></i>
                </button>
                <span>Reporte Detallado del préstamo # {{ $prestamoSeleccionado->id }}</span>
            @endif
        </x-slot>
        <x-slot name="content">
            @if ($prestamoSeleccionado)
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-4">
                        <ul class="list-inside list-disc ml-4">
                            <li><strong>Cliente:</strong> {{ $prestamoSeleccionado->cliente->nombre }}
                                {{ $prestamoSeleccionado->cliente->apellido }}</li>
                            <li><strong>Producto:</strong> {{ $prestamoSeleccionado->producto->nombre }}</li>
                            <li><strong>Monto de Crédito:</strong> {{ $prestamoSeleccionado->monto }}</li>
                            <li><strong>Interés de Crédito:</strong> {{ $prestamoSeleccionado->interes }}%</li>
                            <li><strong>Nro Cuotas:</strong> {{ $prestamoSeleccionado->cuotas }}</li>
                        </ul>
                    </div>
                    <div class="mb-4">
                        <ul class="list-inside list-disc ml-4">
                            <li><strong>Monto x Cuota:</strong>
                                {{ $prestamoSeleccionado->vcuota }}
                            </li>
                            <li><strong>Interés Crédito:</strong>
                                {{ $prestamoSeleccionado->vinteres }}
                            </li>
                            <li><strong>Monto Total:</strong>
                                {{ $prestamoSeleccionado->mtotal }}
                            </li>
                            <li><strong>Fecha Crédito:</strong>
                                {{ $prestamoSeleccionado->fecha }}
                            </li>
                        </ul>
                    </div>
                </div>
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4 border border-gray-300">
                                Nro Cuotas</th>
                            <th class="py-2 px-4 border border-gray-300">
                                Forma de Pago</th>
                            <th class="py-2 px-4 border border-gray-300">
                                Fecha de
                                Pago</th>
                            <th class="py-2 px-4 border border-gray-300">
                                Pago</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= $prestamoSeleccionado->cuotas; $i++)
                            <tr class="{{ $i % 2 == 0 ? 'bg-gray-200' : 'bg-white' }}">
                                <td class="border border-gray-300 py-2 px-12">{{ $i }}</td>
                                <td class="border border-gray-300 py-2 px-12">
                                    {{ $prestamoSeleccionado->formapago->nombre }}</td>
                                <td class="border border-gray-300 py-2 px-12">{{ $prestamoSeleccionado->fecha }}</td>
                                <td class="border border-gray-300 py-2 px-12">{{ $prestamoSeleccionado->vcuota }}</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            @endif
        </x-slot>
        <x-slot name="footer">
        </x-slot>
    </x-dialog-modal>


    @push('js')
        <script>
            Livewire.on('delete', id => {
                console.log(id);
                Swal.fire({
                    title: '¿Estas seguro que deseas eliminar el prestamo?',
                    text: "Esta acción no se puede revertir",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Borrar',
                    cancelButtonText: 'Cancelar'

                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('destroy', {
                            kate: id[0]
                        });
                        Swal.fire(
                            'Eliminado',
                            'El prestamo ha sido eliminado',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush

</div>

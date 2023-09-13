<div>
    <div class="mx-8 rounded-md">
        <div class="col-md-6 text-center">
            <h3 style="font-size: 2.5rem; font-weight: bold;">Registro de préstamos</h3>
        </div>
        <!-- Agrega aquí cualquier componente necesario para crear préstamos -->
        @livewire('crear-prestamo')
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
                                        {{ $prestamo->producto }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p class="bg-indigo-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative text-indigo-900">
                                        {{ $prestamo->monto }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p class="bg-indigo-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative text-indigo-900">
                                        {{ $prestamo->vinteres }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p class="bg-indigo-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative text-indigo-900">
                                        {{ $prestamo->mtotal }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p class="text-sm font-semibold  text-gray-600 p-1 bg-orange-100 rounded-full">
                                        {{ $prestamo->fpago }}
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
                                <p class="relative px-5 text-center">
                                    <!-- Agrega aquí los botones de acciones -->
                                </p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No se encontraron préstamos.</p>
        @endif
    </div>

    {{-- MODAL PARA EDITAR PRÉSTAMO --}}




</div>

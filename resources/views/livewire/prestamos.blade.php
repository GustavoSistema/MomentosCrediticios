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
                            Cliente</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Producto</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Monto</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Interés</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Cuotas</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Método de Pago</th>
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
                                        {{ $prestamo->cliente->nombre }} <!-- {{ $prestamo->cliente->apellido }} -->
                                    </div>
                                </div>
                            </td>
                            <td>{{ $prestamo->producto }}</td>
                            <td>{{ $prestamo->monto }}</td>
                            <td>{{ $prestamo->interes }}</td>
                            <td>{{ $prestamo->cuotas }}</td>
                            <td>{{ $prestamo->fpago }}</td>
                            <td>{{ $prestamo->fecha }}</td>
                            <td>
                                <div class="flex space-x-2">
                                    <!-- Agrega aquí los botones de acciones -->
                                </div>
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

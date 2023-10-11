<div>
    <div class="mx-8 rounded-md mb-4">
        <div class="text-xl font-semibold mt-8">
            <h3 style="font-size: 1.5rem; font-weight: bold;">REGISTRO DE CLIENTES</h3>
        </div>
        <div class="mt-2">
            <div class="flex bg-gray-200 items-center p-2 rounded-md mb-4">
                <span>Buscar: </span>
                <input type="text" wire:model.live ="search"
                    class="bg-gray-50 mx-2 border-indigo-500 rounded-md outline-none ml-1 w-1/2 truncate">
                <div class="ml-auto">
                    @livewire('crear-cliente')
                </div>
            </div>
        </div>
    </div>
    <div class="mx-8 rounded-md">
        @if (isset($clientes))
            <table class="w-full whitespace-nowrap">
                <thead class="bg-slate-600 border-b font-bold text-white">
                    <tr>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">#
                        </th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-2 py-2 text-left">
                            Nombres Completos
                        </th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-3 py- text-left">DNI
                        </th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Celular
                        </th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Direccion
                        </th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Correo
                        </th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Genero
                        </th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Estado
                        </th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                        <tr tabindex="0"
                            class="focus:outline-none h-16 border border-slate-300 rounded hover:bg-gray-200">
                            <td class="pl-5">
                                <div class="flex items-center">
                                    <p
                                        class="bg-indigo-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative text-indigo-900">
                                        {{ $cliente->id }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-1">
                                <div class="flex items-center">
                                    <p class="text-sm font-medium leading-none text-gray-600 mr-2">
                                        {{ $cliente->nombre }} {{ $cliente->apellido }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-0">
                                <div class="flex items-center">
                                    <p class="text-sm leading-none text-gray-600 ml-2 p-2 bg-green-200 rounded-full">
                                        {{ $cliente->dni }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">
                                    <p class="text-sm font-medium leading-none text-gray-600 mr-2">
                                        {{ $cliente->celular }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">
                                    <p class="text-sm font-medium leading-none text-gray-600 mr-2">
                                        {{ $cliente->direccion }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">
                                    <p class="text-sm font-medium leading-none text-gray-600 mr-2">
                                        {{ $cliente->correo }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">
                                    <p class="text-sm font-semibold  text-gray-600 p-1 bg-orange-100 rounded-full">
                                        {{ $cliente->genero }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">
                                    <p
                                    class="text-sm leading-none text-gray-600 ml-2 p-2 bg-blue-200 rounded-full">
                                        {{ $cliente->estado }}
                                    </p>
                                </div>
                            </td>
                            <td>
                                <div class="flex space-x-2">

                                    <a wire:click="edit({{ $cliente->id }})"
                                        class="group py-4 px-4 text-center rounded-md bg-yellow-300 font-bold text-white cursor-pointer hover:bg-yellow-400 hover:animate-pulse">
                                        <i class="fas fa-edit"></i>
                                        <span
                                            class="group-hover:opacity-100 transition-opacity bg-gray-800 px-1 text-sm text-gray-100 rounded-md absolute left-1/2-translate-x-1/2 translate-y-full opacity-0 m-4 mx-auto">
                                            Editar
                                        </span>
                                    </a>
                                    @can('admin.prestamos')
                                    <a wire:click="delete({{ $cliente->id }})"
                                        class="group py-4 px-4 text-center rounded-md bg-red-300 font-bold text-white cursor-pointer hover:bg-red-400  hover:animate-pulse">
                                        <i class="fas fa-trash"></i>
                                        <span
                                            class="group-hover:opacity-100 transition-opacity bg-gray-800 px-1 text-sm text-gray-100 rounded-md absolute left-1/2-translate-x-1/2 translate-y-full opacity-0 m-4 mx-auto">
                                            Eliminar
                                        </span>
                                    </a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>    
            {{ $clientes->links() }}
        @endif
    </div>

    {{-- MODAL PARA EDITAR CLIENTE --}}
    <x-dialog-modal wire:model="editando" wire:loading.attr="disabled">
        <x-slot name="title" class="font-bold">
            <h1 class="text-xl font-bold">Editar Cliente</h1>
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Nombre:" />
                <x-input wire:model="nombre" type="text" class="w-full" />
                <x-input-error for="nombre" />
            </div>
            <div class="mb-4">
                <x-label value="Apellido:" />
                <x-input wire:model="apellido" type="text" class="w-full" />
                <x-input-error for="apellido" />
            </div>
            <div class="mb-4">
                <x-label value="Dni:" />
                <x-input wire:model="dni" type="text" class="w-full" />
                <x-input-error for="dni" />
            </div>
            <div class="mb-4">
                <x-label value="Género:" />
                <select wire:model="genero"
                    class="bg-gray-50 mx-2 border-indigo-500 rounded-md outline-none ml-1 block w-full">
                    <option value="">Selecciona un género</option>
                    @foreach ($opcionesGenero as $opcion)
                        <option value="{{ $opcion }}">{{ $opcion }}</option>
                    @endforeach
                </select>
                <x-input-error for="genero" />
            </div>
            <div class="mb-4">
                <x-label value="Celular:" />
                <x-input wire:model="celular" type="number" class="w-full" />
                <x-input-error for="celular" />
            </div>
            <div class="mb-4">
                <x-label value="Correo:" />
                <x-input wire:model="correo" type="email" class="w-full" />
                <x-input-error for="correo" />
            </div>
            <div class="mb-4">
                <x-label value="Direccion:" />
                <x-input wire:model="direccion" type="text" class="w-full" />
                <x-input-error for="direccion" />
            </div>
            <div class="mb-4">
                <x-label value="Estado:" />
                <x-input wire:model="estado" type="text" class="w-full" />
                <x-input-error for="estado" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('editando',false)" class="mx-2">
                Cancelar
            </x-secondary-button>
            <x-button wire:click="actualizar" wire:loading.attr="disabled" wire:target="create">
                Actualizar
            </x-button>
        </x-slot>
    </x-dialog-modal>

    @push('js')
        <script>
            Livewire.on('delete', id => {
                console.log(id);
                Swal.fire({
                    title: '¿Estas seguro que deseas eliminar al cliente?',
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
                            'El cliente ha sido eliminado',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush

</div>

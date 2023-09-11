<div>
    <div class="mx-8 rounded-md">
        <div class="col-md-6 text-center">
            <h3 style="font-size: 2.5rem; font-weight: bold;">Registro de clientes</h3>
        </div>
        @livewire('crear-cliente')
    </div>
    <div class="mx-8 rounded-md">
        @if (isset($clientes))
            <table class="w-full whitespace-nowrap">
                <thead class="bg-slate-600 border-b font-bold text-white">
                    <tr>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">ID
                        </th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">Nombre
                        </th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Apellido
                        </th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">DNI
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
                                    <div
                                        class="bg-indigo-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative text-indigo-900">
                                        {{ $cliente['id'] }}
                                    </div>
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">
                                    <div
                                        class="bg-indigo-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative text-indigo-900">
                                        {{ $cliente['nombre'] }}
                                    </div>
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">
                                    <div
                                        class="bg-indigo-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative text-indigo-900">
                                        {{ $cliente['apellido'] }}
                                    </div>
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">
                                    <div
                                        class="bg-indigo-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative text-indigo-900">
                                        {{ $cliente['dni'] }}
                                    </div>
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">
                                    <div
                                        class="bg-indigo-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative text-indigo-900">
                                        {{ $cliente['genero'] }}
                                    </div>
                                </div>
                            </td>
                            <td class="pl-5">
                                <div class="flex items-center">
                                    <div
                                        class="bg-indigo-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative text-indigo-900">
                                        {{ $cliente['estado'] }}
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="flex space-x-2">
                                 
                                    <button wire:click="edit({{ $cliente->id }})"
                                        class="group py-4 px-4 text-center rounded-md bg-lime-300 font-bold text-white cursor-pointer hover:bg-lime-400 hover:animate-pulse">
                                        <i class="fas fa-edit"></i>
                                        <span
                                            class="group-hover:opacity-100 transition-opacity bg-gray-800 px-1 text-sm text-gray-100 rounded-md absolute left-1/2-translate-x-1/2 translate-y-full opacity-0 m-4 mx-auto">
                                            Editar
                                        </span>
                                    </button>

                                    <a wire:click="delete({{ $cliente->id }})"
                                        class="group py-4 px-4 text-center rounded-md bg-indigo-300 font-bold text-white cursor-pointer hover:bg-indigo-400  hover:animate-pulse">
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
            {{ $clientes->links() }}
        @endif
    </div>

    {{-- MODAL PARA EDITAR TALLER --}}
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
                <select wire:model="genero" class="bg-gray-50 mx-2 border-indigo-500 rounded-md outline-none ml-1 block w-full">
                    <option value="">Selecciona un género</option>
                    @foreach ($opcionesGenero as $opcion)
                        <option value="{{ $opcion }}">{{ $opcion }}</option>
                    @endforeach
                </select>
                <x-input-error for="genero" />
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
    
</div>

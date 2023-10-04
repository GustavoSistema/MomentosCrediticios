<div>
    <div class="mx-8 rounded-md mb-4">
        <div class="col-md-6 text-center">
            <h3 style="font-size: 2.5rem; font-weight: bold;">Registro de Evaluación</h3>
        </div>
        <div>
            <div class="flex bg-gray-200 items-center p-2 rounded-md mb-4">
                <span>Buscar: </span>
                <input wire:model.live="search"
                    class="bg-gray-50 mx-2 border-indigo-500 rounded-md outline-none ml-1 w-1/2 truncate">
                <div class="ml-auto">
                    @livewire('crear-evaluacion')
                </div>
            </div>
        </div>
    </div>
    <div class="mx-8 rounded-md">
        @if (isset($evaluacion) && count($evaluacion) > 0)
            <table class="w-full whitespace-nowrap">
                <thead class="bg-slate-600 border-b font-bold text-white">
                    <tr>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            #</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Nombres</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Taller</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Dni</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Celular</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Correo</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Fecha</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Estado</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($evaluacion as $evalua)
                        <tr tabindex="0"
                            class="focus:outline-none h-16 border border-slate-300 rounded hover:bg-gray-200">
                            <td class="pl-5">
                                <div class="flex items-center">
                                    <div
                                        class="bg-indigo-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative text-indigo-900">
                                        {{ $evalua->id }}
                                    </div>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p class="text-sm font-medium leading-none text-gray-600 mr-2">
                                        {{ $evalua->nomcliente }} {{ $evalua->apecliente }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p class="text-sm font-medium leading-none text-gray-600 mr-2">
                                        {{ $evalua->taller->nombre }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p class="text-sm leading-none text-gray-600 ml-2 p-2 bg-green-200 rounded-full">
                                        {{ $evalua->dnicliente }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p class="text-sm font-medium leading-none text-gray-600 mr-2">
                                        {{ $evalua->celular }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p class="text-sm font-medium leading-none text-gray-600 mr-2">
                                        {{ $evalua->email }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p class="text-sm font-medium leading-none text-gray-600 mr-2">
                                        {{ $evalua->fecha }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p class="text-sm leading-none text-gray-600 ml-2 p-2 bg-blue-200 rounded-full">
                                        {{ $evalua->estado }}
                                    </p>
                                </div>
                            </td>
                            <td>
                                <div class="flex space-x-2">
                                    <a wire:click="verDocumento({{ $evalua }})"
                                        class="group py-4 px-4 text-center rounded-md bg-indigo-300 font-bold text-white cursor-pointer hover:bg-indigo-400  hover:animate-pulse">
                                        <i class="fas fa-file"></i>
                                        <span
                                            class="group-hover:opacity-100  bg-gray-800 px-1 text-sm text-gray-100 rounded-md absolute left-1/2-translate-x-1/2 translate-y-full opacity-0 m-4 mx-auto">
                                            Documentos
                                        </span>
                                    </a>
                                    <a wire:click="editEstado({{ $evalua->id }})"
                                        class="group py-4 px-4 text-center rounded-md bg-lime-300 font-bold text-white cursor-pointer hover:bg-lime-400 hover:animate-pulse">
                                        <i class="far fa-eye"></i>
                                        <span
                                            class="group-hover:opacity-100 transition-opacity bg-gray-800 px-1 text-sm text-gray-100 rounded-md absolute left-1/2-translate-x-1/2 translate-y-full opacity-0 m-4 mx-auto">
                                            Estado
                                        </span>
                                    </a>
                                    <a wire:click="edit({{ $evalua->id }})"
                                        class="group py-4 px-4 text-center rounded-md bg-yellow-300 font-bold text-white cursor-pointer hover:bg-yellow-400 hover:animate-pulse">
                                        <i class="fas fa-edit"></i>
                                        <span
                                            class="group-hover:opacity-100 transition-opacity bg-gray-800 px-1 text-sm text-gray-100 rounded-md absolute left-1/2-translate-x-1/2 translate-y-full opacity-0 m-4 mx-auto">
                                            Editar
                                        </span>
                                    </a>
                                    <a wire:click="delete({{ $evalua->id }})"
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
            {{ $evaluacion->links() }}
        @endif
    </div>

    {{-- MODAL PARA EDITAR ESTADO EN ACCIONES --}}
    <x-dialog-modal wire:model="editando" wire:loading.attr="disabled">
        <x-slot name="title" class="font-bold">
            <h1 class="text-xl font-bold">Cambiar Estado</h1>
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Nuevo estado:" />
                <select wire:model="nuevoEstado"
                    class="bg-gray-50 mx-2 border-indigo-500 rounded-md outline-none ml-1 block w-full">
                    <option value="Por Revisar">Por Revisar</option>
                    <option value="Revisado">Revisado</option>
                    <option value="Observado">Observado</option>
                </select>
                @error('nuevoEstado')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('editando',false)" class="mx-2">
                Cancelar
            </x-secondary-button>
            <x-button wire:click="actualizarEstado" wire:loading.attr="disabled" wire:target="create">
                Actualizar
            </x-button>
        </x-slot>
    </x-dialog-modal>

    {{-- MODAL PARA EDITAR --}}
    <x-dialog-modal wire:model="editando2" wire:loading.attr="disabled">
        <x-slot name="title" class="font-bold">
            <h1 class="text-xl font-bold">Editar Evaluacion</h1>
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Taller:" />
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
            <div class="mb-4">
                <x-label value="Nombre del cliente" />
                <x-input wire:model="nomcliente" class="w-full" />
                @error('nomcliente')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <x-label value="Apellido del cliente" />
                <x-input wire:model="apecliente" class="w-full" />
                @error('apecliente')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <x-label value="DNI del cliente" />
                <x-input wire:model="dnicliente" class="w-full" />
                @error('dnicliente')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <x-label value="Número de celular" />
                <x-input wire:model="celular" class="w-full" />
                @error('celular')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <x-label value="Correo electrónico" />
                <x-input wire:model="email" class="w-full" />
                @error('email')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <x-label value="Fecha" />
                <x-input wire:model="fecha" type="date" class="w-full" />
                @error('fecha')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <x-label value="Documento" />
                <x-input wire:model="documento" />
                @error('documento')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('editando2', false)" class="mx-2">
                Cancelar
            </x-secondary-button>
            <x-button wire:click="actualizar" wire:loading.attr="disabled" wire:target="create">
                Actualizar
            </x-button>
        </x-slot>
    </x-dialog-modal>

    {{-- MODAL PARA MOSTRAR LOS DOCUMENTOS --}}
    <x-dialog-modal wire:model="editando3" wire:loading.attr="disabled">
        <x-slot name="title" class="font-bold">
            <h1 class="text-xl font-bold">Carpeta de Documentos</h1>
        </x-slot>
        <x-slot name="content" class="h-auto">
            <div class="flex flex-wrap justify-center text-center">
                @if (isset($documentos))
                    @foreach ($documentos as $fil)
                        <div class="w-1/5 p-2 items-center justify-center text-center">
                            <img alt="gallery" class="mx-auto flex object-cover object-center w-15 h-15 rounded-lg"
                                src="/images/{{ $fil->extension }}.png">
                            <div class="block">
                                <p class="truncate text-sm">{{ $fil->nombre }}</p>
                                <div class="flex flex-row justify-center text-center">
                                    <a class="group max-w-max relative mx-1 flex flex-col items-center justify-center rounded-full border border-gray-500 p-1 text-gray-500 hover:bg-gray-200 hover:text-gray-600"
                                        href="#">
                                        <!-- Text/Icon goes here -->
                                        <p class="flex justify-center items-center"><i class="fas fa-info-circle"></i>
                                        </p>
                                        <!-- Tooltip here -->
                                        <div
                                            class="[transform:perspective(50px)_translateZ(0)_rotateX(10deg)] group-hover:[transform:perspective(0px)_translateZ(0)_rotateX(0deg)] absolute bottom-0 mb-6 origin-bottom transform rounded text-white opacity-0 transition-all duration-300 group-hover:opacity-100 z-10">
                                            <div class="flex w-56 flex-col items-center">
                                                <div class="rounded bg-gray-900 p-2 text-xs text-center shadow-lg">
                                                    Información:
                                                    <p class="text-xs">Cargado el: {{ $fil->created_at }}</p>
                                                </div>
                                                <div class="clip-bottom h-2 w-4 bg-gray-900 text-xs"></div>
                                            </div>
                                        </div>
                                    </a>
                                    <a wire:click="descargarDocumento('{{ $fil->ruta }}')"><i
                                            class="fas fa-download mt-1 mx-auto hover:text-indigo-400"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button class="hover:animate-pulse inline-block rounded-full bg-amber-400 p-2 uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:bg-amber-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-amber-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-amber-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)]">
                <a href="#" wire:click="descargarDocumentosEnCarpeta">Descargar Todos </a>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4">
                    <path fill-rule="evenodd"
                        d="M19.5 21a3 3 0 003-3V9a3 3 0 00-3-3h-5.379a.75.75 0 01-.53-.22L11.47 3.66A2.25 2.25 0 009.879 3H4.5a3 3 0 00-3 3v12a3 3 0 003 3h15zm-6.75-10.5a.75.75 0 00-1.5 0v4.19l-1.72-1.72a.75.75 0 00-1.06 1.06l3 3a.75.75 0 001.06 0l3-3a.75.75 0 10-1.06-1.06l-1.72 1.72V10.5z"
                        clip-rule="evenodd" />
                </svg>
            </x-secondary-button>
            <x-secondary-button wire:click="$set('editando3',false)" class="mx-2">
                Cancelar
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>

    @push('js')
        <script>
            Livewire.on('delete', id => {
                console.log(id);
                Swal.fire({
                    title: '¿Estas seguro que deseas eliminar la evaluacion?',
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
                            'La evaluacion ha sido eliminado',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush
</div>

<div>
    <div class="mx-8 rounded-md">
        <div class="col-md-6 text-center">
            <h3 style="font-size: 2.5rem; font-weight: bold;">Registro de Evaluación</h3>
        </div>
        @livewire('crear-evaluacion')
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
                                    <a wire:click="verDocumento('{{ $evalua->id }}')"
                                        class="group py-4 px-4 text-center rounded-md bg-indigo-300 font-bold text-white cursor-pointer hover:bg-indigo-400  hover:animate-pulse">
                                        <i class="fas fa-file"></i>
                                        <span
                                            class="group-hover:opacity-100  bg-gray-800 px-1 text-sm text-gray-100 rounded-md absolute left-1/2-translate-x-1/2 translate-y-full opacity-0 m-4 mx-auto">
                                            Documentos
                                        </span>
                                    </a>
                                    <a wire:click="editEstado('{{ $evalua->id }}')"
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

    {{-- MODAL VER DOCUMENTOS --}}
    <x-dialog-modal wire:model="editando3" wire:loading.attr="disabled">
        <x-slot name="title" class="font-bold">
            <h1 class="pt-2  font-semibold sm:text-lg text-gray-900">
                Documentos:
            </h1>
        </x-slot>
        <x-slot name="content">
            @foreach ($evaluacion as $evalua)
                <tr>
                    <td>{{ $evalua->id }}</td>
                    <!-- Otras columnas de evaluación -->
                    <td>
                        @php
                            $documentos = File::allFiles(public_path('storage/evaluacion'));
                            $documentosEvaluacion = [];
                            
                            foreach ($documentos as $documento) {
                                $nombreDocumento = pathinfo($documento, PATHINFO_FILENAME);
                                if (strpos($evalua->documentos, $nombreDocumento) !== false) {
                                    $documentosEvaluacion[] = $nombreDocumento;
                                }
                            }
                        @endphp

                        @if (!empty($documentosEvaluacion))
                            <ul>
                                @foreach ($documentosEvaluacion as $documento)
                                    <li><a href="{{ asset('storage/evaluacion/' . $documento) }}"
                                            target="_blank">{{ $documento }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <!-- Otras columnas de evaluación -->
                </tr>
            @endforeach
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('editando3', false)">
                Cerrar
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

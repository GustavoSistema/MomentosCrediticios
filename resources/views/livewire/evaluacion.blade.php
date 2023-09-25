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
                            Taller</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Nombres</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Dni</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Celular</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Correo</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Fecha</th>
                        <th scope="col" class="text-sm font-medium font-semibold text-white px-6 py-4 text-left">
                            Documentos</th>
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
                                        {{ $evalua->taller->nombre }}
                                    </p>
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
                                    <p class="text-sm leading-none text-gray-600 ml-2 p-2 bg-green-200 rounded-full">
                                        {{ $evalua->dnicliente }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p
                                        class="bg-indigo-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative text-indigo-900">
                                        {{ $evalua->celular }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p
                                        class="bg-indigo-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative text-indigo-900">
                                        {{ $evalua->email }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p
                                        class="bg-indigo-200 rounded-sm w-5 h-5 flex flex-shrink-0 justify-center items-center relative text-indigo-900">
                                        {{ $evalua->fecha }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p class="text-sm font-semibold  text-gray-600 p-1 bg-orange-100 rounded-full">
                                        {{ $evalua->documento }}
                                    </p>
                                </div>
                            </td>
                            <td class="pl-2">
                                <div class="flex items-center">
                                    <p class="text-sm font-semibold  text-gray-600 p-1 bg-orange-100 rounded-full">
                                        {{ $evalua->estado }}
                                    </p>
                                </div>
                            </td>
                            <td>
                                <div class="flex space-x-2">
                                    <a wire:click="editEstado('{{ $evalua->id }}')"
                                        class="group py-4 px-4 text-center rounded-md bg-lime-300 font-bold text-white cursor-pointer hover:bg-lime-400 hover:animate-pulse">
                                        <i class="far fa-eye"></i>
                                        <span
                                            class="group-hover:opacity-100 transition-opacity bg-gray-800 px-1 text-sm text-gray-100 rounded-md absolute left-1/2-translate-x-1/2 translate-y-full opacity-0 m-4 mx-auto">
                                            Cambiar Estado
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
</div>

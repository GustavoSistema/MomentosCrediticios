<div class="mt-8 mx-auto max-w-screen-2xl bg-gray-200 p-6 rounded-md border border-gray-400">
    <div class="mx-8 rounded-md mb-4">
        <h2 class="mt-8 text-indigo-600 font-bold text-3xl">
            <i class="fa-solid fa-unlock-keyhole fa-xl"></i>
             &nbsp;Permisos                          
        </h2> 
        <div class="mt-3">
            <div class="flex bg-white items-center p-2 rounded-md mb-4">
                <span>Buscar: </span>
                <input type="text" wire:model.live="search"
                    class="bg-gray-50 mx-2 border-indigo-500 rounded-md outline-none ml-1 w-1/2 truncate">
                <div class="ml-auto">
                    @livewire('create-permiso')
                </div>
            </div>
        </div>
    </div>

    <div class="mx-8 rounded-md">
        @if (count($permisos))
            <table class="w-full whitespace-nowrap">
                <thead class="bg-slate-600 border-b font-bold text-white">
                    <tr>
                        <th class=" w-24 cursor-pointer hover:font-bold hover:text-indigo-500 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            wire:click="order('id')">
                            Id
                            @if ($sort == 'id')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-numeric-up-alt float-right mt-0.5"></i>
                                @else
                                    <i class="fas fa-sort-numeric-down-alt float-right mt-0.5"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-0.5"></i>
                            @endif
                        </th>
                        <th class="cursor-pointer hover:font-bold hover:text-indigo-500  px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            wire:click="order('name')">
                            Nombre
                            @if ($sort == 'name')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-0.5"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-0.5"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-0.5"></i>
                            @endif
                        </th>  
                        <th class="cursor-pointer hover:font-bold hover:text-indigo-500  px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            wire:click="order('descripcion')">
                            Descripcion
                            @if ($sort == 'descripcion')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-0.5"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-0.5"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-0.5"></i>
                            @endif
                        </th>  
                        <th class="cursor-pointer hover:font-bold hover:text-indigo-500  px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            wire:click="order('created_at')">
                            Fecha de creación
                            @if ($sort == 'created_at')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-numeric-up-alt float-right mt-0.5"></i>
                                @else
                                    <i class="fas fa-sort-numeric-down-alt float-right mt-0.5"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-0.5"></i>
                            @endif
                        </th>                                     
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permisos as $item)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <p class="text-indigo-900 p-1 bg-indigo-200 rounded-md">
                                        {{ $item->id }}
                                    </p>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <p
                                        class="text-slate-900 font-semibold whitespace-no-wrap">
                                        {{ $item->name }}
                                    </p>
                                </div>
                            </td>    
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <p
                                        class="whitespace-no-wrap">
                                        {{ $item->descripcion? $item->descripcion : "Sin datos" }}
                                    </p>
                                </div>
                            </td>  
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <p
                                        class="whitespace-no-wrap uppercase">
                                        {{ $item->created_at->format("d-m-Y h:m:i a") }}
                                    </p>
                                </div>
                            </td>                                        
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center justify-center">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        <button wire:click="edit({{$item->id}})"
                                            class="px-2 py-2 bg-indigo-600 rounded-md flex items-center justify-center">
                                            <i class="fas fa-pen text-white"></i>
                                        </button>
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>  
            @if ($permisos->hasPages())
            <div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-2 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <div class="px-5 py-5 bg-white border-t">
                            {{ $permisos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @else
        <div class="px-6 py-4 text-center font-bold bg-indigo-200 rounded-md">
            No se encontro ningun registro.
        </div>
        @endif
    </div>
   

    {{-- MODAL PARA EDITAR PERMISO--}}
    <x-dialog-modal wire:model="editando" wire:loading.attr="disabled">
        <x-slot name="title" class="font-bold">
            <h1 class="text-xl font-bold"><i class="fa-solid fa-pen text-white"></i> &nbsp;Editar Permiso</h1>
        </x-slot>

        <x-slot name="content">
            
            <div class="mb-4">
                <x-label value="Nombre:" />
                <x-input wire:model="name" type="text" class="w-full" />
                <x-input-error for="name" />
            </div>  
             
            <div class="mb-4">
                <x-label value="Descripcion:" />
                <x-input wire:model="descripcion" type="text" class="w-full" />
                <x-input-error for="descripcion" />
            </div>        
           
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('editando',false)" class="mx-2">
                Cancelar
            </x-secondary-button>
            <x-button wire:click="actualizar" wire:loading.attr="disabled" wire:target="actualizar">
                Actualizar
            </x-button>

        </x-slot>

    </x-dialog-modal>
</div>

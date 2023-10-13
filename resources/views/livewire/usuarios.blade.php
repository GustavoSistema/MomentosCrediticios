<div class="mt-8 mx-auto max-w-screen-2xl bg-gray-200 p-6 rounded-md border border-gray-400">
    <div class="mx-8 rounded-md mb-4">
        <h2 class="mt-4 text-indigo-600 font-bold text-3xl">
            <i class="fa-solid fa-user-tag fa-xl"></i>
            &nbsp;Usuarios
        </h2>
        <div class="mt-6">
            <div class="flex bg-white items-center p-2 rounded-md mb-4">
                <span>Buscar: </span>
                <input type="text" wire:model.live="search"
                    class="bg-gray-50 mx-2 border-indigo-500 rounded-md outline-none ml-1 w-1/2 truncate">
                <div class="ml-auto">
                    @livewire('crear-usuario')
                </div>
            </div>
        </div>
    </div>

    <div class="mx-8 rounded-md">
        @if (count($usuarios))
            <table class="min-w-full leading-normal rounded-md">
                <thead>
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
                        <th class="cursor-pointer hover:font-bold hover:text-indigo-500 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider"
                            wire:click="order('email')">
                            correo
                            @if ($sort == 'email')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-0.5"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-0.5"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-0.5"></i>
                            @endif
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Rol
                        </th>
                        <th
                            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $item)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <p class="text-indigo-900 p-1 bg-indigo-200 rounded-md">
                                        {{ strtoupper($item->id) }}
                                    </p>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <p class="text-slate-900 font-semibold whitespace-no-wrap uppercase">
                                        {{ $item->name }}
                                    </p>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $item->email }}
                                    </p>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        @if ($item->roles)
                                            @foreach ($item->roles as $rol)
                                                <span>{{ $rol->name }}</span>
                                            @endforeach
                                        @endif
                                    </p>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center justify-center">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        <button wire:click="editarUsuario({{ $item->id }})"
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
            @if ($usuarios->hasPages())
                <div>
                    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-2 overflow-x-auto">
                        <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                            <div class="px-5 py-5 bg-white border-t">
                                {{ $usuarios->links() }}
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


    {{-- MODAL PARA EDITAR USUARIO --}}
    <x-dialog-modal wire:model="editando" wire:loading.attr="disabled">
        <x-slot name="title" class="font-bold">
            <h1 class="text-xl font-bold"><i class="fa-solid fa-user-pen text-white"></i> &nbsp;Editar Usuario</h1>
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Nombre:" />
                <x-input wire:model="name" type="text" class="w-full" />
                <x-input-error for="name" />
            </div>
            <div class="mb-4">
                <x-label value="Email:" />
                <x-input wire:model="email" type="text" class="w-full" />
                <x-input-error for="email" />
            </div>
            @if (isset($usuario->rutaFirma) && $firma == null)
                <div class="w-5/6 m-auto py-4">
                    <img class="h-auto max-w-full m-auto border bg-white p-1 rounded-md shadow-md"
                        src="{{ Storage::url($usuario->rutaFirma) }}" alt="FirmaInspector-{{ $usuario->id }}">
                </div>
            @endif
            <div class="mb-4">
                <x-label value="Roles:" />
                @if (isset($roles))
                    @foreach ($roles as $key => $rol)
                        <div class="flex items-center pl-3">
                            <input wire:model="selectedRoles" id="{{ $rol->id . 'checkbox' }}" type="checkbox"
                                value="{{ $rol->name }}"
                                class="w-4 h-4 text-indigo-600 bg-indigo-100 border-gray-300 rounded outline-none  focus:ring-indigo-600  focus:ring-1 dark:bg-gray-600 dark:border-gray-500">
                            <label for="{{ $rol->id . 'checkbox' }}"
                                class="py-2 ml-2 text-sm font-medium text-gray-900 ">
                                {{ $rol->name }}
                            </label>
                        </div>
                    @endforeach
                @endif
            </div>
            <x-input-error for="selectedRoles" />
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

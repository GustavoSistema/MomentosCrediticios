<div>
    <button wire:click="$set('open',true)" class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
        Crear Evaluación
    </button>
    <x-dialog-modal wire:model="open" wire:loading.attr="disabled">
        <x-slot name="title" class="font-bold">
            <h1 class="text-xl font-bold"><i class="fa-solid fa-plus text-white"></i> &nbsp;Crear Evaluación</h1>
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-label value="Taller:" for="taller" />
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
            <div class="flex space-x-2">
                <div class="w-1/2">
                    <x-label value="Nombres:" />
                    <x-input wire:model="nomcliente" type="text" id="nomcliente" class="w-full" />
                    <x-input-error for="nomcliente" />
                </div>
                <div class="w-1/2">
                    <x-label value="Apellidos:" />
                    <x-input wire:model="apecliente" type="text" id="apecliente" class="w-full" />
                    <x-input-error for="apecliente" />
                </div>
            </div>

            <div class="mb-4">
                <x-label value="DNI:" />
                <x-input wire:model="dnicliente" type="text" id="dnicliente" class="w-full" />
                <x-input-error for="dnicliente" />
            </div>
            <div class="flex space-x-2">
                <div class="w-1/2">
                    <x-label value="Fecha:" />
                    <x-input wire:model="fecha" type="date" id="fecha" class="w-full" />
                    <x-input-error for="fecha" />
                </div>
                <div class="w-1/2">
                    <x-label value="Estado:" for="estado" />
                    <x-input value="Por Revisar" type="text" id="estado" class="w-full" readonly />
                    @error('estado')
                        <span class="text-red-500">{{ $message }}
                        @enderror
                </div>
            </div>

            <div class="mb-4">
                <x-label value="Subir Documentos:" />
                <input wire:model="documentos" type="file" id="{{ $borradocumento }}" class="w-full" multiple
                    accept=".pdf,.docx" />
                @error('documentos.*')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <h1 class="font-semibold sm:text-lg text-gray-900">
                Galería de documentos:
            </h1>
            @if ($documentos)
                <section class="mt-4 overflow-hidden border-dotted border-2 text-gray-700"
                    id="{{ 'section-' . $identificador }}">
                    <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
                        <div class="flex flex-wrap -m-1 md:-m-2">
                            @foreach ($documentos as $key => $documento)
                                <div class="flex flex-wrap w-1/5">
                                    <div class="w-full p-1 md:p-2 items-center justify-center text-center">
                                        @if (in_array($documento->extension(), ['pdf', 'xls', 'xlsx', 'docx']))
                                            <img alt="gallery"
                                                class="mx-auto flex object-cover object-center w-15 h-15 rounded-lg"
                                                src="{{ asset('images/pdf.png') }}">
                                        @else
                                            <img alt="gallery"
                                                class="mx-auto flex object-cover object-center w-15 h-15 rounded-lg"
                                                src="{{ asset('images/pdf.png') }}">
                                        @endif
                                        <p class="truncate text-sm">{{ $documento->getClientOriginalName() }}</p>
                                        <a class="flex" wire:click="deleteDocumentUpload({{ $key }})"><i
                                                class="fas fa-trash mt-1 mx-auto hover:text-indigo-400"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            @else
                <section class="h-full overflow-auto p-8 w-full h-full flex flex-col">
                    <ul id="gallery-documents" class="flex flex-1 flex-wrap -m-1">
                        <li id="empty"
                            class="h-full w-full text-center flex flex-col items-center justify-center items-center">
                            <img class="mx-auto w-32"
                                src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png"
                                alt="no data" />
                            <span class="text-small text-gray-500">Aún no seleccionaste ningún archivo</span>
                        </li>
                    </ul>
                </section>
            @endif

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="resetForm" class="mx-2">
                Cancelar
            </x-secondary-button>
            <x-button wire:click="crearEvaluacion" wire:loading.attr="disabled" wire:target="crearEvaluacion"
                class="bg-indigo-500 text-white py-2 px-4 rounded-md shadow-md">
                Guardar
            </x-button>
        </x-slot>
    </x-dialog-modal>

</div>

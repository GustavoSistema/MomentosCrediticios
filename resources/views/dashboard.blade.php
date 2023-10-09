<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @include('livewire._sidebar') <!-- Incluir el menú lateral aquí -->
                <div class="main-content">
                    <!-- Contenido principal de tu página -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
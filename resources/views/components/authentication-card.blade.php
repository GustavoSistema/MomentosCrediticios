<div class="min-h-screen flex flex-col pt-6 sm:pt-0 bg-gray-100">
    <div class="background-container" style="background-image: url('{{ asset('images/fondolo.png') }}'); display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100vh;">

        <div>
            {{ $logo }}
        </div>

        <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</div>
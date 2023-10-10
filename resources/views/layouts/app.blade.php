<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--para el menu-->
    <script src="{{ asset('js/menu.js') }}"></script>

    <!-- Styles -->
    @livewireStyles
</head>



<body class="font-sans antialiased">
    <x-banner />

    <!-- Agrega la barra de navegación -->
    <div class="bg-gray-900 text-white py-4 px-6 flex items-center justify-between">
        <div class="flex items-center">
            <button id="toggleMenu" class="text-2xl mr-4 focus:outline-none">
                <i id="menuIcon" class="fas fa-bars"></i>
            </button>
            <!--<h1 class="text-xl font-semibold">Momentos Crediticios</h1>-->           
        </div>

        <div class="flex items-center">
            <div class="max-w-xs">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 w-auto">
                </a>
            </div>
        </div>

        <div class="ml-3 relative">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                    @else
                        <span class="inline-flex rounded-md">
                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-700 hover:text-white focus:outline-none focus:bg-gray-600 active:bg-gray-600 transition ease-in-out duration-150">
                                {{ Auth::user()->name }}
                                <svg class="ml-2 -mr-0.5 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                        </span>
                    @endif
                </x-slot>
        
                <x-slot name="content" >
                    <!-- Account Management -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Account') }}
                    </div>
        
                    <x-dropdown-link href="{{ route('profile.show') }}">
                        {{ __('Profile') }}
                    </x-dropdown-link>
        
                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-dropdown-link>
                    @endif
        
                    <div class="border-t border-gray-200"></div>
        
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
        
                        <x-dropdown-link href="{{ route('logout') }}"
                                 @click.prevent="$root.submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    </div>

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation')
        <!-- Page Heading
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif
        -->
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')
    @livewireScripts

    @stack('js')

    <script>
        Livewire.on('CustomAlert', function(params) {
            console.log(params);
            Swal.fire(
                params[0]["titulo"],
                params[0]["mensaje"],
                params[0]["icono"],
            )
        });
    </script>

    <script>
        const toggleMenu = () => {
            const menu = document.querySelector('.menu');
            menu.classList.toggle('hidden');

            const menuIcon = document.getElementById('menuIcon');
            menuIcon.classList.toggle('fa-bars');
            menuIcon.classList.toggle('fa-times');
        };

        const toggleMenuButton = document.getElementById('toggleMenu');
        toggleMenuButton.addEventListener('click', toggleMenu);
    </script>


</body>

</html>

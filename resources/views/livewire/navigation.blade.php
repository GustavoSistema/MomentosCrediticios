<div
    class="menu sidebar absolute top-16 left-0 xl:rounded-r transform xl:translate-x-0 ease-in-out transition duration-500 flex justify-start items-start h-full w-full sm:w-64 bg-gray-500 flex-col hidden z-20">

    <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
    <div class="mt-6 flex flex-col justify-start items-center  pl-4 w-full border-gray-600 border-b space-y-3 pb-5 ">
        <button
            class="flex jusitfy-start items-center space-x-6 w-full  focus:outline-none  focus:text-indigo-400  text-white rounded ">
            <svg class="fill-stroke " width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M9 4H5C4.44772 4 4 4.44772 4 5V9C4 9.55228 4.44772 10 5 10H9C9.55228 10 10 9.55228 10 9V5C10 4.44772 9.55228 4 9 4Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path
                    d="M19 4H15C14.4477 4 14 4.44772 14 5V9C14 9.55228 14.4477 10 15 10H19C19.5523 10 20 9.55228 20 9V5C20 4.44772 19.5523 4 19 4Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path
                    d="M9 14H5C4.44772 14 4 14.4477 4 15V19C4 19.5523 4.44772 20 5 20H9C9.55228 20 10 19.5523 10 19V15C10 14.4477 9.55228 14 9 14Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path
                    d="M19 14H15C14.4477 14 14 14.4477 14 15V19C14 19.5523 14.4477 20 15 20H19C19.5523 20 20 19.5523 20 19V15C20 14.4477 19.5523 14 19 14Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

            <a href="{{ route('inicio') }}">Inicio</a>
        </button>
        <button
            class="flex jusitfy-start items-center w-full  space-x-6 focus:outline-none text-white focus:text-indigo-400   rounded ">
            <svg class="fill-stroke" width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path
                    d="M6 21V19C6 17.9391 6.42143 16.9217 7.17157 16.1716C7.92172 15.4214 8.93913 15 10 15H14C15.0609 15 16.0783 15.4214 16.8284 16.1716C17.5786 16.9217 18 17.9391 18 19V21"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <p class="text-base leading-4 ">Usuarios</p>
        </button>
        <button
            class="flex jusitfy-start items-center w-full  space-x-6 focus:outline-none text-white focus:text-indigo-400   rounded ">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M14 8.00002C15.1046 8.00002 16 7.10459 16 6.00002C16 4.89545 15.1046 4.00002 14 4.00002C12.8954 4.00002 12 4.89545 12 6.00002C12 7.10459 12.8954 8.00002 14 8.00002Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M4 6H12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M16 6H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path
                    d="M8 14C9.10457 14 10 13.1046 10 12C10 10.8954 9.10457 10 8 10C6.89543 10 6 10.8954 6 12C6 13.1046 6.89543 14 8 14Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M4 12H6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M10 12H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path
                    d="M17 20C18.1046 20 19 19.1046 19 18C19 16.8955 18.1046 16 17 16C15.8954 16 15 16.8955 15 18C15 19.1046 15.8954 20 17 20Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M4 18H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M19 18H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <p class="text-base leading-4 ">Roles y Permisos</p>
        </button>
    </div>

    <div class="flex flex-col justify-start items-center   px-6 border-b border-gray-600 w-full  ">

        <button onclick="showMenu1(true)"
            class="focus:outline-none focus:text-indigo-400  text-white flex justify-between items-center w-full py-5 space-x-14  ">
            <p class="text-sm leading-5 uppercase">Evaluación</p>
            <svg id="icon1" class="transform rotate-180" width="24" height="24" viewBox="0 0 24 24"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
        <div id="menu1" class="hidden flex justify-start flex-col items-start pb-5 ">
            <button
                class="flex justify-start items-center space-x-6 hover:text-white focus:bg-gray-700 focus:text-white hover:bg-gray-700 text-gray-400 rounded px-3 py-2 w-full md:w-52">
                <i class="fa-solid fa-user-plus"></i>
                <a href="{{ route('evaluacion') }}">Crear Evaluación</a>
            </button>
            <button
                class="flex justify-start items-center space-x-6 hover:text-white focus:bg-gray-700 focus:text-white hover:bg-gray-700 text-gray-400 rounded px-3 py-2 w-full md:w-52">
                <i class="fa-solid fa-user-pen"></i>
                <a href="{{ route('ver-evaluacion') }}">Ver Evaluación</a>
            </button>
        </div>       
    </div>

    <div class="flex flex-col justify-start items-center   px-6 border-b border-gray-600 w-full  ">
        <button onclick="showMenu2(true)"
            class="focus:outline-none focus:text-indigo-400  text-white flex justify-between items-center w-full py-5 space-x-14  ">
            <p class="text-sm leading-5 uppercase">Prestamos</p>
            <svg id="icon2" class="transform rotate-180" width="24" height="24" viewBox="0 0 24 24"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
        <div id="menu2" class="hidden flex justify-start flex-col items-start pb-5 ">
            <button
                class="flex justify-start items-center space-x-6 hover:text-white focus:bg-gray-700 focus:text-white hover:bg-gray-700 text-gray-400 rounded px-3 py-2 w-full md:w-52">
                <i class="fa-solid fa-user-plus"></i>
                <a href="{{ route('admin.clientes') }}">Crear Cliente</a>
            </button>
            <button
                class="flex justify-start items-center space-x-6 hover:text-white focus:bg-gray-700 focus:text-white hover:bg-gray-700 text-gray-400 rounded px-3 py-2 w-full md:w-52">
                <i class="fa-sharp fa-solid fa-landmark"></i>
                <a href="{{ route('admin.prestamos') }}">Préstamos</a>
            </button>
            <button
                class="flex justify-start items-center space-x-6 hover:text-white focus:bg-gray-700 focus:text-white hover:bg-gray-700 text-gray-400 rounded px-3 py-2 w-full md:w-52">
                <i class="fas fa-dollar-sign"></i>
                <a href="{{ route('cobranzas') }}">Cobranzas</a>
            </button>
        </div>
    </div>

    <div class="flex flex-col justify-start items-center   px-6 border-b border-gray-600 w-full  ">

        <button onclick="showMenu4(true)"
            class="focus:outline-none focus:text-indigo-400  text-white flex justify-between items-center w-full py-5 space-x-14  ">
            <p class="text-sm leading-5 uppercase">Credito</p>
            <svg id="icon4" class="transform rotate-180" width="24" height="24" viewBox="0 0 24 24"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
        <div id="menu4" class="hidden flex justify-start flex-col items-start pb-5 ">
            <button
                class="flex justify-start items-center space-x-6 hover:text-white focus:bg-gray-700 focus:text-white hover:bg-gray-700 text-gray-400 rounded px-3 py-2 w-full md:w-52">
                <i class="fa-solid fa-ticket"></i>
                <a href="{{ route('inicio') }}">Ver Credito</a>
            </button>
        </div>
    </div>

    <div class="flex flex-col justify-start items-center   px-6 border-b border-gray-600 w-full  ">

        <button onclick="showMenu5(true)"
            class="focus:outline-none focus:text-indigo-400  text-white flex justify-between items-center w-full py-5 space-x-14  ">
            <p class="text-sm leading-5 uppercase">TABLAS</p>
            <svg id="icon5" class="transform rotate-180" width="24" height="24" viewBox="0 0 24 24"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
        <div id="menu5" class="hidden flex justify-start flex-col items-start pb-5 ">
            <button
                class="flex justify-start items-center space-x-6 hover:text-white focus:bg-gray-700 focus:text-white hover:bg-gray-700 text-gray-400 rounded px-3 py-2 w-full md:w-52">
                <i class="fa-solid fa-car"></i>
                <a href="{{ route('talleres') }}">Talleres</a>
            </button>
            <button
                class="flex justify-start items-center space-x-6 hover:text-white focus:bg-gray-700 focus:text-white hover:bg-gray-700 text-gray-400 rounded px-3 py-2 w-full md:w-52">
                <i class="fa-solid fa-toolbox"></i>
                <a href="{{ route('productos') }}">Productos</a>
            </button>
        </div>
    </div>

    <div class="flex flex-col justify-start items-center   px-6 border-b border-gray-600 w-full  ">
        <button onclick="showMenu3(true)"
            class="focus:outline-none focus:text-indigo-400  text-white flex justify-between items-center w-full py-5 space-x-14  ">
            <p class="text-sm leading-5  uppercase">REPORTES</p>
            <svg id="icon3" class="rotate-180 transform" width="24" height="24" viewBox="0 0 24 24"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18 15L12 9L6 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </button>
        <div id="menu3" class="hidden flex justify-start flex-col items-start pb-5 ">
            <button
                class="flex justify-start items-center space-x-6 hover:text-white focus:bg-gray-700 focus:text-white hover:bg-gray-700 text-gray-400 rounded px-3 py-2  w-52">
                <i class="fa-solid fa-chart-column"></i>
                <a href="{{ route('reporte') }}">Reporte General</a>
            </button>
            <button
                class="flex justify-start items-center space-x-6 hover:text-white focus:bg-gray-700 focus:text-white hover:bg-gray-700 text-gray-400 rounded px-3 py-2  w-52">
                <i class="fa-solid fa-chart-column"></i>
                <a class="text-base leading-4  ">Deudas</a>
            </button>
            <button
                class="flex justify-start items-center space-x-6 hover:text-white focus:bg-gray-700 focus:text-white hover:bg-gray-700 text-gray-400 rounded px-3 py-2 w-52">
                <i class="fa-solid fa-chart-column"></i>
                <a class="text-base leading-4  ">Pagos Completos</a>
            </button>
            <button
                class="flex justify-start items-center space-x-6 hover:text-white focus:bg-gray-700 focus:text-white hover:bg-gray-700 text-gray-400 rounded px-3 py-2  w-52">
                <i class="fa-solid fa-chart-column"></i>
                <a class="text-base leading-4  ">Pagos Pendientes</a>
            </button>
        </div>
    </div>

    
</div>


<script>
    let icon1 = document.getElementById("icon1");
    let menu1 = document.getElementById("menu1");
    const showMenu1 = () => {
        icon1.classList.toggle("rotate-180");
        menu1.classList.toggle("hidden");
    };

    let icon2 = document.getElementById("icon2");
    let menu2 = document.getElementById("menu2");
    const showMenu2 = () => {
        icon2.classList.toggle("rotate-180");
        menu2.classList.toggle("hidden");
    };

    let icon3 = document.getElementById("icon3");
    let menu3 = document.getElementById("menu3");
    const showMenu3 = () => {
        icon3.classList.toggle("rotate-180");
        menu3.classList.toggle("hidden");
    };

    let icon4 = document.getElementById("icon4");
    let menu4 = document.getElementById("menu4");
    const showMenu4 = () => {
        icon4.classList.toggle("rotate-180");
        menu4.classList.toggle("hidden");
    };

    let icon5 = document.getElementById("icon5");
    let menu5 = document.getElementById("menu5");
    const showMenu5 = () => {
        icon5.classList.toggle("rotate-180");
        menu5.classList.toggle("hidden");
    };

    let Main = document.getElementById("Main");
    let open = document.getElementById("open");
    let close = document.getElementById("close");

    const showNav = () => {
        Main.classList.toggle("-translate-x-full");
        Main.classList.toggle("translate-x-0");
        open.classList.toggle("hidden");
        close.classList.toggle("hidden");
    };
</script>

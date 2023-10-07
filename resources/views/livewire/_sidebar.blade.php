<div class="menu sidebar">
    <button id="menu-toggle" class="menu-icon">&#9776;</button>
    <ul>
        <li><a href="{{ route('inicio') }}">Inicio</a></li>
        <li><a href="{{ route('evaluacion') }}">Evaluación</a></li>
        <li><a href="{{ route('clientes') }}">Clientes</a></li>
        <li><a href="{{ route('prestamos') }}">Préstamos</a></li>
        <li><a href="{{ route('cobranzas') }}">Cobranzas</a></li>
        <li><a href="{{ route('reportes') }}">Reportes</a></li>

        <li>
            <a href="#">Pagos</a>
        </li>
        <li class="submenu">
            <a href="#">Opciones</a>
            <ul>
                <li><a href="#">Usuarios</a></li>
                <li><a href="#">Roles y Permisos</a></li>
            </ul>
        </li>
        <!-- Agregar más opciones de menú y submenús si es necesario -->
    </ul>
</div>
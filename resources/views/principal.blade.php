<!DOCTYPE html>
<html>
<head>
    <title>Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            min-height: 100vh;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Menú lateral -->
            <div class="col-md-3 sidebar p-4">
                <h5>Menú</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a class="nav-link active" href="{{ route('jugadores.index') }}">Cargar Jugador</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="{{ route('parejas.index') }}">Cargar Parejas</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="{{ route('partidos.index') }}">Partidos</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a class="nav-link" href="{{ route('clasificacion.index') }}">Clasificación</a>
                    </li>
                    <li class="nav-item mt-3">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm w-100">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </div>

            <!-- Contenido principal -->
            <div class="col-md-9 p-4">
                <h3>Bienvenido, {{ Auth::user()->nombre }}</h3>
                @yield('contenido') 
            </div>
        </div>
    </div>
</body>
</html>


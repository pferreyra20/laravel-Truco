@extends('principal')

@section('contenido')
<div class="card">
    <div class="card-header">Cargar Jugador</div>
    <div class="card-body">
        <form action="{{ route('jugadores.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" name="apellido" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Aceptar</button>
            <a href="{{ url('/') }}" class="btn btn-secondary">Salir</a>
        </form>
    </div>
</div>
@endsection

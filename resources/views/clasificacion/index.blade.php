@extends('principal')

@section('contenido')
    <div class="container">
        <h3 class="mb-4">Tabla de Clasificación</h3>

        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Jugador</th>
                    <th>Ganados</th>
                    <th>Perdidos</th>
                    <th>Diferencia Partidos</th>
                    <th>Puntos Ganados</th>
                    <th>Puntos Perdidos</th>
                    <th>Diferencia Puntos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clasificacion as $index => $c)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $c->nombre_completo }}</td>
                        <td>{{ $c->ganados }}</td>
                        <td>{{ $c->perdidos }}</td>
                        <td>{{ $c->difpartidos }}</td>
                        <td>{{ $c->puntos_ganados }}</td>
                        <td>{{ $c->puntos_perdidos }}</td>
                        <td>{{ $c->diferencia_partidos }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ url('/') }}" class="btn btn-secondary">SALIR</a>
        <a href="{{ route('clasificacion.pdf') }}" class="btn btn-primary mb-3">Exportar a PDF</a>
    </div>
@endsection

@extends('principal')

@section('contenido')
<div class="container">
    <h2>Cargar Parejas</h2>

    <form method="POST" action="{{ route('parejas.store') }}">
        @csrf
        <div class="mb-3 border rounded p-3">
            <label><strong>Cantidad de jugadores</strong></label><br>
            <input type="radio" name="tipo_pareja" value="2" checked onclick="toggleJugador3()"> Pareja de 2 jugadores
            <input type="radio" name="tipo_pareja" value="3" onclick="toggleJugador3()"> Pareja de 3 jugadores
        </div>

        <div class="mb-3">
            <label>Jugador 1</label>
            <select name="pareja1" class="form-control">
                @foreach($jugadores as $jugador)
                    <option value="{{ $jugador->id }}">{{ $jugador->nombre }} {{ $jugador->apellido }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Jugador 2</label>
            <select name="pareja2" class="form-control">
                @foreach($jugadores as $jugador)
                    <option value="{{ $jugador->id }}">{{ $jugador->nombre }} {{ $jugador->apellido }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3" id="jugador3-box" style="display: none;">
            <label>Jugador 3</label>
            <select name="pareja3" class="form-control">
                <option value="">-- Opcional --</option>
                @foreach($jugadores as $jugador)
                    <option value="{{ $jugador->id }}">{{ $jugador->nombre }} {{ $jugador->apellido }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">AGREGAR PAREJA</button>
        <a href="{{ route('parejas.index') }}" class="btn btn-secondary">CANCELAR</a>
        <a href="{{ url('/') }}" class="btn btn-secondary">SALIR</a>
    </form>

    <hr>

    <h3>Parejas cargadas</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Jugador 1</th>
                <th>Jugador 2</th>
                <th>Jugador 3</th>
                <th>Jugador 4</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($parejas as $p)
                <tr>
                    <td>{{ $p->pareja_id }}</td>
                    <td>{{ $p->jugador1 }}</td>
                    <td>{{ $p->jugador2 }}</td>
                    <td>{{ $p->jugador3 }}</td>
                    <td>{{ $p->jugador4 }}</td>
                    <td>{{ $p->tipo_pareja }}</td>
                    <td>
                        <a href="{{ route('parejas.edit', $p->pareja_id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('parejas.destroy', $p->pareja_id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('¿Desea eliminar la pareja seleccionada?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
function toggleJugador3() {
    const tipo = document.querySelector('input[name="tipo_pareja"]:checked').value;
    document.getElementById('jugador3-box').style.display = tipo === '3' ? 'block' : 'none';
}
</script>
@endsection

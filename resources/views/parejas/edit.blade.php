@extends('principal')

@section('contenido')
<div class="container">
    <h2>Editar Pareja</h2>

    <form method="POST" action="{{ route('parejas.update', $pareja->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Cantidad de jugadores</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo_pareja" id="dos_jugadores" value="2" {{ $pareja->pareja3 == null ? 'checked' : '' }}>
                <label class="form-check-label" for="dos_jugadores">Pareja de 2 jugadores</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="tipo_pareja" id="tres_jugadores" value="3" {{ $pareja->pareja3 != null ? 'checked' : '' }}>
                <label class="form-check-label" for="tres_jugadores">Pareja de 3 jugadores</label>
            </div>
        </div>

        <div class="mb-3">
            <label for="pareja1" class="form-label">Jugador 1</label>
            <select name="pareja1" id="pareja1" class="form-control" required>
                <option value="">Seleccione un jugador</option>
                @foreach($jugadores as $jugador)
                    <option value="{{ $jugador->id }}" {{ $pareja->pareja1 == $jugador->id ? 'selected' : '' }}>
                        {{ $jugador->nombre }} {{ $jugador->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="pareja2" class="form-label">Jugador 2</label>
            <select name="pareja2" id="pareja2" class="form-control" required>
                <option value="">Seleccione un jugador</option>
                @foreach($jugadores as $jugador)
                    <option value="{{ $jugador->id }}" {{ $pareja->pareja2 == $jugador->id ? 'selected' : '' }}>
                        {{ $jugador->nombre }} {{ $jugador->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3" id="jugador3_div">
            <label for="pareja3" class="form-label">Jugador 3</label>
            <select name="pareja3" id="pareja3" class="form-control">
                <option value="">Seleccione un jugador (opcional)</option>
                @foreach($jugadores as $jugador)
                    <option value="{{ $jugador->id }}" {{ $pareja->pareja3 == $jugador->id ? 'selected' : '' }}>
                        {{ $jugador->nombre }} {{ $jugador->apellido }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 d-flex gap-2">
            <button type="submit" class="btn btn-primary">ACTUALIZAR PAREJA</button>
            <a href="{{ route('parejas.index') }}" class="btn btn-secondary">CANCELAR</a>
        </div>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const tipoDos = document.getElementById('dos_jugadores');
        const tipoTres = document.getElementById('tres_jugadores');
        const jugador3Div = document.getElementById('jugador3_div');

        function toggleJugador3() {
            if (tipoTres.checked) {
                jugador3Div.style.display = 'block';
            } else {
                jugador3Div.style.display = 'none';
                document.getElementById('pareja3').value = '';
            }
        }

        tipoDos.addEventListener('change', toggleJugador3);
        tipoTres.addEventListener('change', toggleJugador3);

        toggleJugador3(); // inicializa visibilidad
    });
</script>
@endsection


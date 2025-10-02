@extends('principal')

@section('contenido')
<div class="container">
    <h2 class="mb-4">Editar Partido</h2>

    <form method="POST" action="{{ route('partidos.update', $partido->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="cfecha" class="form-label">Fecha del Partido</label>
            <input type="date" name="cfecha" id="cfecha" class="form-control  w-auto" 
                   value="{{ \Carbon\Carbon::parse($partido->cfecha)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="pareja_id1" class="form-label">Pareja 1</label>
                <select name="pareja_id1" class="form-control">
                    @foreach ($parejas as $pareja)
                        <option value="{{ $pareja->pareja_id }}">
                            {{ $pareja->jugador1 }} - {{ $pareja->jugador2 }}
                            @if ($pareja->jugador3) - {{ $pareja->jugador3 }} @endif
                            @if ($pareja->jugador4) - {{ $pareja->jugador4 }} @endif
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label for="pareja_id2" class="form-label">Pareja 2</label>
                <select name="pareja_id1" class="form-control">
                    @foreach ($parejas as $pareja)
                        <option value="{{ $pareja->pareja_id }}">
                            {{ $pareja->jugador1 }} - {{ $pareja->jugador2 }}
                            @if ($pareja->jugador3) - {{ $pareja->jugador3 }} @endif
                            @if ($pareja->jugador4) - {{ $pareja->jugador4 }} @endif
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="puntos_pareja1" class="form-label">Puntos Pareja 1</label>
                <input type="number" name="puntos_pareja1" id="puntos_pareja1" class="form-control w-auto" 
                       value="{{ $partido->puntos_pareja1 }}" required min="0" max="30">
            </div>

            <div class="col-md-6 mb-3">
                <label for="puntos_pareja2" class="form-label">Puntos Pareja 2</label>
                <input type="number" name="puntos_pareja2" id="puntos_pareja2" class="form-control w-auto" 
                       value="{{ $partido->puntos_pareja2 }}" required min="0" max="30">
            </div>
        </div>

        <div class="mb-4">
            <button type="submit" class="btn btn-primary">Actualizar Partido</button>
            <a href="{{ route('partidos.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>
</div>
@endsection

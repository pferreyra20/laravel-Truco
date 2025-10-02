<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Clasificación</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: center; font-size: 12px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h3 style="text-align: center;">Tabla de Clasificación</h3>

    <table>
        <thead>
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
</body>
</html>

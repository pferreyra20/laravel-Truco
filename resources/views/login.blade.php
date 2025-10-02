<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label>Nombre:</label>
        <input type="text" name="nombre" required><br>
        <label>Contraseña:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Ingresar</button>
    </form>
    @if ($errors->any())
        <div style="color: red;">
            {{ $errors->first() }}
        </div>
    @endif
</body>
</html>

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\ParejaController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\ClasificacionController;

// Página raíz: redirige a login si no está autenticado
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('principal');
    }
    return redirect()->route('login.form');
});

// Mostrar formulario de login
Route::get('/login', function () {
    return view('welcome');
})->name('login.form');

// Procesar login con AuthController
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Cerrar sesión
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login.form');
})->name('logout');

// Rutas protegidas con middleware auth
Route::middleware('auth')->group(function () {

    // Página principal luego de login
    Route::get('/principal', function () {
        return view('principal', ['usuario' => Auth::user()]);
    })->name('principal');

    // Cargar jugador desde formulario rápido
    Route::post('/guardar-jugador', function (Request $request) {
        DB::table('jugador')->insert([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
        ]);
        return redirect()->route('principal')->with('success', 'Jugador cargado correctamente.');
    })->name('jugador.guardar');

    // Rutas de Jugadores
    Route::get('/jugadores', [JugadorController::class, 'index'])->name('jugadores.index');
    Route::post('/jugadores', [JugadorController::class, 'store'])->name('jugadores.store');

    // Rutas de Parejas
    Route::get('/parejas', [ParejaController::class, 'index'])->name('parejas.index');
    Route::post('/parejas', [ParejaController::class, 'store'])->name('parejas.store');
    Route::get('/parejas/{id}/edit', [ParejaController::class, 'edit'])->name('parejas.edit');
    Route::put('/parejas/{id}', [ParejaController::class, 'update'])->name('parejas.update');
    Route::delete('/parejas/{id}', [ParejaController::class, 'destroy'])->name('parejas.destroy');

    // Rutas de Partidos
    Route::get('/partidos', [PartidoController::class, 'index'])->name('partidos.index');
    Route::post('/partidos', [PartidoController::class, 'store'])->name('partidos.store');
    Route::get('/partidos/{id}/edit', [PartidoController::class, 'edit'])->name('partidos.edit');
    Route::put('/partidos/{id}', [PartidoController::class, 'update'])->name('partidos.update');
    Route::delete('/partidos/{id}', [PartidoController::class, 'destroy'])->name('partidos.destroy');

    
    
});


Route::get('/clasificacion', [ClasificacionController::class, 'index'])->name('clasificacion.index');
Route::get('/clasificacion/pdf', [ClasificacionController::class, 'exportarPDF'])->name('clasificacion.pdf');
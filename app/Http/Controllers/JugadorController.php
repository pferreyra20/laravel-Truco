<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JugadorController extends Controller
{
    public function index() {
        $usuario = Auth::user();
        return view('jugadores.index');
    }

    public function store(Request $request) {
        $jugador = new Jugador();
        $jugador->nombre = $request->nombre;
        $jugador->apellido = $request->apellido;
        $jugador->save();

        return redirect()->route('jugadores.index')->with('success', 'Jugador guardado correctamente.');
    }
}

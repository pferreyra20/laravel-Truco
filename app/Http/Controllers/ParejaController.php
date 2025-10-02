<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Pareja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ParejaController extends Controller
{
    public function index()
    {
        try {
            $usuario = Auth::user();
            $jugadores = Jugador::all();
            $parejas = DB::table('vista_parejas')->get();
    
            return view('parejas.index', compact('jugadores', 'parejas'));
    
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'pareja1' => 'required|different:pareja2|different:pareja3',
            'pareja2' => 'required|different:pareja1|different:pareja3',
            'pareja3' => 'nullable|different:pareja1|different:pareja2',
            

        ]);

        Pareja::create([
            'pareja1' => $request->pareja1,
            'pareja2' => $request->pareja2,
            'pareja3' => $request->tipo_pareja === '3' ? $request->pareja3 : null,
            
        ]);

        return redirect()->route('parejas.index')->with('success', 'Pareja agregada correctamente.');
    }

    public function destroy($id)
    {
        Pareja::findOrFail($id)->delete();
        return back()->with('success', 'Pareja eliminada.');
    }

    public function edit($id)
    {
        $usuario = Auth::user();
        $pareja = Pareja::findOrFail($id);
        $jugadores = Jugador::all();

        return view('parejas.edit', compact('pareja', 'jugadores'));
    }

    public function update(Request $request, $id)
    {
        $pareja = Pareja::findOrFail($id);

        $pareja->update([
            'pareja1' => $request->pareja1,
            'pareja2' => $request->pareja2,
            'pareja3' => $request->tipo_pareja === '3' ? $request->pareja3 : null,
        ]);

        return redirect()->route('parejas.index')->with('success', 'Pareja actualizada.');
    }
}

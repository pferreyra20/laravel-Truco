<?php
namespace App\Http\Controllers;

use App\Models\Partido;
use App\Models\Pareja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PartidoController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        $partidos = DB::table('vista_partidos')->get();
        $parejas = DB::table('vista_parejas')->get();
        return view('partidos.index', compact('partidos', 'parejas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cfecha' => 'required|date',
            'pareja_id1' => 'required|exists:parejas,id|different:pareja_id2',
            'pareja_id2' => 'required|exists:parejas,id|different:pareja_id1',
            'puntos_pareja1' => 'required|integer|min:0|max:30',
            'puntos_pareja2' => 'required|integer|min:0|max:30',
        ]);

        Partido::create([
            'cfecha' => $request->cfecha,
            'pareja_id1' => $request->pareja_id1,
            'pareja_id2' => $request->pareja_id2,
            'partido' => 1,
            'puntos_pareja1' => $request->puntos_pareja1,
            'puntos_pareja2' => $request->puntos_pareja2,
            'fecha' => now(),
        ]);

        return redirect()->back()->with('success', 'Partido agregado exitosamente.');
    }

    public function edit($id)
    {
        $usuario = Auth::user();
        $partido = Partido::findOrFail($id);
        $parejas = DB::table('vista_parejas')->get();
        return view('partidos.edit', compact('partido', 'parejas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cfecha' => 'required|date',
            'pareja_id1' => 'required|exists:parejas,id|different:pareja_id2',
            'pareja_id2' => 'required|exists:parejas,id|different:pareja_id1',
            'puntos_pareja1' => 'required|integer|min:0|max:30',
            'puntos_pareja2' => 'required|integer|min:0|max:30',
        ]);

        $partido = Partido::findOrFail($id);
        $partido->update([
            'cfecha' => $request->cfecha,
            'pareja_id1' => $request->pareja_id1,
            'pareja_id2' => $request->pareja_id2,
            'puntos_pareja1' => $request->puntos_pareja1,
            'puntos_pareja2' => $request->puntos_pareja2,
        ]);

        return redirect()->route('partidos.index')->with('success', 'Partido actualizado.');
    }

    public function destroy($id)
    {
        Partido::destroy($id);
        return redirect()->back()->with('success', 'Partido eliminado.');
    }
}

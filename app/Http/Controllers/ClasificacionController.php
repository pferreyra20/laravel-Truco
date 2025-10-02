<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clasificacion;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ClasificacionController extends Controller
{
    public function index()
    {
        
        $clasificacion = Clasificacion::all();
        return view('clasificacion.index', compact('clasificacion'));
    }
    public function exportarPDF()
    {
        // Consulta directa a la vista con ordenamiento
        $clasificacion = DB::table('vista_clasificacion')
            ->select('nombre_completo', 'ganados', 'perdidos', 'difpartidos', 'puntos_ganados', 'puntos_perdidos', 'diferencia_partidos')
            ->orderByDesc('diferencia_partidos')
            ->orderByDesc('puntos_ganados')
            ->get();
    
        // Cargar la vista para el PDF
        $pdf = Pdf::loadView('clasificacion.pdf', compact('clasificacion'));
    
        // Mostrar en el navegador en vez de descargar
        return $pdf->stream('clasificacion.pdf');
    }

}

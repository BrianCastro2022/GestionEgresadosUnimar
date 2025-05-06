<?php

namespace App\Http\Controllers;

use App\Models\AcademicHistory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AcademicHistoryController extends Controller
{
    public function index()
    {
        $histories = AcademicHistory::where('user_id', auth()->id())->latest()->get();

        return Inertia::render('AcademicHistory/Index', [
            'histories' => $histories,
        ]);
    }

    public function create()
    {
        return Inertia::render('AcademicHistory/Create');
    }

    public function store(Request $request)
    {
        // Validación de los datos
        $validated = $request->validate([
            'institution' => 'required|string|max:255',
            'study_type' => 'required|in:Pregrado,Posgrado,Certificación,Otro',
            'completion_date' => 'required|date',
        ]);

        // Creación del historial académico
        AcademicHistory::create([
            ...$validated,
            'user_id' => auth()->id(),
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('academic-history.index')
                         ->with('success', 'Historial académico registrado correctamente.');
    }
}

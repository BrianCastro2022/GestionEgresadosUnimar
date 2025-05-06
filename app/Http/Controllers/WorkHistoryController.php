<?php

namespace App\Http\Controllers;

use App\Models\WorkHistory;
use Illuminate\Http\Request;

class WorkHistoryController extends Controller
{
    // Mostrar el formulario de registro del historial laboral
    public function create()
    {
        return inertia('WorkHistory/Create');
    }

    // Almacenar el historial laboral
    public function store(Request $request)
    {
        $request->validate([
            'company' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'description' => 'required|string',
        ]);

        WorkHistory::create([
            'user_id' => auth()->id(),
            'company' => $request->company,
            'position' => $request->position,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'description' => $request->description,
        ]);

        return redirect()->route('work-history.index')->with('status', 'Historial laboral registrado exitosamente');
    }

    // Mostrar historial laboral del usuario
    public function index()
    {
        $workHistories = WorkHistory::where('user_id', auth()->id())->get();
        return inertia('WorkHistory/Index', ['workHistories' => $workHistories]);
    }
}

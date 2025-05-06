<?php

// app/Http/Controllers/GraduateSkillController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GraduateSkill;
use Illuminate\Support\Facades\Auth;

class GraduateSkillController extends Controller
{
    public function create()
    {
        // Lista predeterminada
        $defaultSkills = [
            'technical' => ['Programación', 'Base de Datos', 'Redes', 'Soporte Técnico'],
            'soft' => ['Trabajo en equipo', 'Comunicación', 'Liderazgo', 'Pensamiento crítico']
        ];

        return inertia('GraduateSkills/Create', [
            'defaultSkills' => $defaultSkills
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'technical_skills' => 'array',
            'soft_skills' => 'array',
        ]);

        GraduateSkill::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'technical_skills' => $request->technical_skills,
                'soft_skills' => $request->soft_skills
            ]
        );

        return redirect()->route('dashboard')->with('message', 'Habilidades registradas exitosamente.');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicHistory extends Model
{
    use HasFactory;

    // Agregar los campos a la propiedad fillable
    protected $fillable = [
        'institution',
        'study_type',
        'completion_date',
        'user_id', // Asegúrate de incluir el user_id si no lo tienes
    ];
}

<?php

// app/Models/GraduateSkill.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GraduateSkill extends Model
{
    protected $fillable = ['user_id', 'technical_skills', 'soft_skills'];

    protected $casts = [
        'technical_skills' => 'array',
        'soft_skills' => 'array',
    ];
}

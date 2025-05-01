<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'job_title',
        'testimonial',
        'clients_served',
        'experience_duration',
        'expertise_level',
        'profile_image',
    ];
}

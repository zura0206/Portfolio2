<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkExperience extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'job_title',
        'company',
        'period',
        'description',
        'responsibilities',
    ];

protected $casts = [
    'responsibilities' => 'array' // Automatic JSON decoding
];
}

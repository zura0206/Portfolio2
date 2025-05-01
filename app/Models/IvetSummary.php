<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IvetSummary extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'professional_skills',
        'networking',
        'trend_awareness',
        'personal_growth'
    ];
}

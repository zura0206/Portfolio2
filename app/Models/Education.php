<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    Use HasFactory;

    protected $fillable =[
        'course',
        'school_name',
        'duration',
        'description'
    ];  
}

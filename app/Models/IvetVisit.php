<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IvetVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'description',
        'key_takeaways',
        'reflection',
        'image_url'
    ];

    protected $casts = [
        'key_takeaways' => 'array'
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'cert_title',
        'cert_issuer',
        'cert_year',
        "cert_description"        
    ];
    
}

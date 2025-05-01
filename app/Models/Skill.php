<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'tools', 'percentage'];

    public function getIconPath()
    {
        $iconPaths = [
            'design' => 'M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
            'frontend' => 'M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4',
            'backend' => 'M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4m0 5c0 2.21-3.582 4-8 4s-8-1.79-8-4',
            'uiux' => 'M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4',
            'ecommerce' => 'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z',
            'seo' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'
        ];

        $category = $this->getCategoryFromTools();
        
        return $iconPaths[$category] ?? $iconPaths['frontend'];
    }

    protected function getCategoryFromTools()
    {
        $lower = strtolower($this->tools);
        
        if (str_contains($lower, 'figma') || str_contains($lower, 'xd')) return 'uiux';
        if (str_contains($lower, 'html') || str_contains($lower, 'react') || str_contains($lower, 'javascript')) return 'frontend';
        if (str_contains($lower, 'php') || str_contains($lower, 'laravel') || str_contains($lower, 'node')) return 'backend';
        if (str_contains($lower, 'woocommerce') || str_contains($lower, 'shopify')) return 'ecommerce';
        if (str_contains($lower, 'seo')) return 'seo';
        if (str_contains($lower, 'design')) return 'design';
        
        return 'frontend';
    }
}

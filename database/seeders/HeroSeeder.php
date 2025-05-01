<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hero::create([
            'name' => 'Marldrey',
            'job_title' => 'Website Designer',
            'testimonial' => "Marldrey's exceptional Web design ensured our website's success. Highly recommended!",
            'clients_served' => '20+',
            'experience_duration' => '1 Year',
            'expertise_level' => 'Experts',
            'profile_image' => 'resources/img/MB.png',
        ]);
    }
}

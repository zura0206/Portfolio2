<?php

namespace Database\Seeders;

use App\Models\IvetSummary;
use Illuminate\Database\Seeder;

class IvetSummariesTableSeeder extends Seeder
{
    public function run()
    {
        // Clear existing data
        IvetSummary::truncate();

        // Create default summary
        IvetSummary::create([
            'professional_skills' => 'These visits elevated my technical expertise by exposing me to industry best practices. Adopting efficient workflows and advanced methodologies has transformed my development process.',
            'networking' => 'Engaging with industry professionals opened doors to mentorship and collaboration, strengthening my ties to the web development community and guiding my career growth.',
            'trend_awareness' => 'Exposure to emerging technologies at top firms keeps my skills ahead of the curve, allowing me to proactively adapt to industry shifts.',
            'personal_growth' => 'These experiences built confidence, clarified my career goals, and deepened my passion for web design through exposure to industry excellence.'
        ]);
    }
}
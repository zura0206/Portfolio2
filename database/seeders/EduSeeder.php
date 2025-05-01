<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Education;

class EduSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Education::create([
            'course' => 'B.S. in Computer Science',
            'duration' => '2019 - 2023',
            'school_name' => 'University of Technology',
            'description' => 'Specialized in Web Development and UI Design, graduating with honors (GPA: 3.8/4.0).',
        ]);

        Education::create([
            'course' => 'A.S. in Multimedia Design',
            'duration' => '2017 - 2019',
            'school_name' => 'Creative Arts College',
            'description' => 'Mastered design principles, typography, color theory, and digital media creation. Graduated with distinction.',
        ]);

        Education::create([
            'course' => 'High School Diploma',
            'duration' => '2013 - 2017',
            'school_name' => 'St. Mary\'s Academy',
            'description' => 'Excelled in Computer Studies and Mathematics, leading Web Design Club initiatives. Graduated in top 5% of class.',
        ]);

        Education::create([
            'course' => 'Web Development Bootcamp',
            'duration' => '2016 (Summer)',
            'school_name' => 'CodeCamp Academy',
            'description' => 'Intensive 12-week program focused on full-stack development. Built 5 production-ready web applications.',
        ]);
    }
}

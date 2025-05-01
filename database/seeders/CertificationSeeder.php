<?php

namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Seeder;

class CertificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Certification::create([
            'cert_title' => 'UI/UX Designer',
            'cert_issuer' => 'Google',
            'cert_year' => 2021,
            'cert_description' => 'User experience research, wireframing, prototyping and usability testing for digital products.',
        ]);

        Certification::create([
            'cert_title' => 'Front-End Web Developer',
            'cert_issuer' => 'Meta',
            'cert_year' => 2022,
            'cert_description' => 'HTML, CSS, JavaScript, and React for creating modern web interfaces.',
        ]);

        Certification::create([
            'cert_title' => 'Data Analytics',
            'cert_issuer' => 'Google',
            'cert_year' => 2021,
            'cert_description' => 'Data cleaning, analysis, visualization, and using tools like SQL and Tableau.',
        ]);

        Certification::create([
            'cert_title' => 'Responsive Web Design',
            'cert_issuer' => 'freeCodeCamp',
            'cert_year' => 2020,
            'cert_description' => 'Building responsive websites using HTML5, CSS3, and Flexbox/Grid layouts.',
        ]);

        Certification::create([
            'cert_title' => 'Laravel PHP Framework Certification',
            'cert_issuer' => 'Udemy',
            'cert_year' => 2023,
            'cert_description' => 'Backend web development with Laravel, including REST APIs and authentication.',
        ]);

        Certification::create([
            'cert_title' => 'Professional Soft Skills for Developers',
            'cert_issuer' => 'LinkedIn Learning',
            'cert_year' => 2022,
            'cert_description' => 'Effective communication, teamwork, and problem-solving for software development teams.',
        ]);

        // 🔥 New Seed 1
        Certification::create([
            'cert_title' => 'Advanced JavaScript Programming',
            'cert_issuer' => 'Udemy',
            'cert_year' => 2023,
            'cert_description' => 'Deep dive into ES6+, asynchronous JavaScript, and design patterns.',
        ]);

        // 🔥 New Seed 2
        Certification::create([
            'cert_title' => 'AWS Certified Cloud Practitioner',
            'cert_issuer' => 'Amazon Web Services (AWS)',
            'cert_year' => 2024,
            'cert_description' => 'Foundational cloud computing concepts, AWS services, security, and architecture principles.',
        ]);
    }
}

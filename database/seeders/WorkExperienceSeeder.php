<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('work_experiences')->insert([
            [
                'job_title' => 'Web Designer & Developer',
                'company' => 'TechSavvy Solutions',
                'period' => '2023 - Present',
                'description' => 'Led design and development for client websites across diverse industries, emphasizing responsive design and superior user experiences. Collaborated closely with developers to ensure pixel-perfect implementation.',
                'responsibilities' => json_encode([
                    'Boosted client conversion rates by 30% through optimized UI/UX',
                    'Designed and developed 15+ responsive websites across sectors',
                    'Enhanced search rankings with SEO best practices',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'job_title' => 'Junior Web Developer',
                'company' => 'Digital Creators Agency',
                'period' => '2022 - 2023',
                'description' => 'Supported senior developers in building and maintaining client websites, focusing on frontend development with HTML, CSS, JavaScript, and PHP.',
                'responsibilities' => json_encode([
                    'Contributed to 10+ projects in e-commerce and corporate sectors',
                    'Improved website load times by up to 40% through optimization',
                    'Developed responsive email templates for marketing campaigns',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'job_title' => 'Web Design Intern',
                'company' => 'CreativeTech Studios',
                'period' => '2021 - 2022',
                'description' => 'Gained hands-on experience in web design and development, assisting with design mockups and basic HTML/CSS implementation in a professional environment.',
                'responsibilities' => json_encode([
                    'Created wireframes and mockups for 5+ client projects',
                    'Mastered responsive design principles',
                    'Developed proficiency in Adobe Creative Suite and Figma',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

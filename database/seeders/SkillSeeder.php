<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run()
    {
        $skills = [
            [
                'title' => 'Web Design',
                'description' => 'Creating visually appealing, responsive websites that deliver exceptional user experiences across all devices.',
                'tools' => 'HTML/CSS',
                'percentage' => 95,
            ],
            [
                'title' => 'Frontend Development',
                'description' => 'Building interactive and dynamic user interfaces using modern JavaScript frameworks and libraries.',
                'tools' => 'JavaScript/React',
                'percentage' => 85,
            ],
            [
                'title' => 'Backend Development',
                'description' => 'Developing robust server-side applications and RESTful APIs using PHP and Laravel framework.',
                'tools' => 'PHP/Laravel',
                'percentage' => 80,
            ],
            [
                'title' => 'UI/UX Design',
                'description' => 'Creating intuitive and engaging user interfaces with a focus on user experience and accessibility.',
                'tools' => 'Figma/Adobe XD',
                'percentage' => 90,
            ],
            [
                'title' => 'E-commerce Solutions',
                'description' => 'Building secure and scalable online stores with payment gateway integration and inventory management.',
                'tools' => 'WooCommerce/Shopify',
                'percentage' => 85,
            ],
            [
                'title' => 'SEO Optimization',
                'description' => 'Implementing search engine optimization strategies to improve website visibility and organic traffic.',
                'tools' => 'On-page/Off-page SEO',
                'percentage' => 75,
            ],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
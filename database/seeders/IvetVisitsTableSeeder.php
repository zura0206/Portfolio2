<?php

namespace Database\Seeders;

use App\Models\IvetVisit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class IvetVisitsTableSeeder extends Seeder
{
    public function run()
    {
        // Clear existing data
        IvetVisit::truncate();

        // Sample visits data
        $visits = [
            [
                'title' => 'Tech Innovation Hub',
                'date' => 'March 2024',
                'description' => 'Explored Silicon Valley\'s leading tech innovation center, diving into emerging web technologies and cutting-edge design trends.',
                'key_takeaways' => [
                    'Mastered modern UI/UX methodologies from industry leaders',
                    'Explored AI-driven design tools revolutionizing web development',
                    'Observed agile development practices in action',
                    'Connected with senior developers and design professionals'
                ],
                'reflection' => 'This visit reshaped my approach to web design. Witnessing professionals tackle complex challenges inspired me to prioritize user-centered methodologies and accessibility in my work.',
                'image_url' => null
            ],
            [
                'title' => 'Digital Marketing Agency',
                'date' => 'January 2024',
                'description' => 'Toured a leading digital marketing agency specializing in web presence optimization and conversion-focused design.',
                'key_takeaways' => [
                    'Learned how web design drives marketing goals',
                    'Mastered advanced SEO techniques for enhanced visibility',
                    'Studied analytics-driven design for higher conversions',
                    'Explored A/B testing for UI optimization'
                ],
                'reflection' => 'This experience connected creative design with marketing impact. I now focus on both aesthetics and measurable results, using data-driven decisions to evaluate project success.',
                'image_url' => null
            ],
            [
                'title' => 'UX Research Laboratory',
                'date' => 'November 2023',
                'description' => 'Engaged in hands-on learning at a UX research facility, observing user testing and modern research methodologies.',
                'key_takeaways' => [
                    'Observed user testing with eye-tracking technology',
                    'Learned structured methods for analyzing user feedback',
                    'Emphasized accessibility testing in web design',
                    'Developed skills for inclusive digital experiences'
                ],
                'reflection' => 'Seeing users struggle with interfaces was a game-changer. This visit deepened my empathy and commitment to designing effective, user-friendly experiences.',
                'image_url' => null
            ],
            [
                'title' => 'E-commerce Development Company',
                'date' => 'September 2023',
                'description' => 'Toured a specialized e-commerce firm, focusing on online store optimization and conversion strategies.',
                'key_takeaways' => [
                    'Optimized checkout processes for seamless user experiences',
                    'Reduced cart abandonment through strategic design',
                    'Integrated payment gateways with robust security',
                    'Mastered product showcase best practices'
                ],
                'reflection' => 'This visit highlighted the importance of trust and simplicity in e-commerce design. I now prioritize user journeys that minimize friction and build confidence.',
                'image_url' => null
            ]
        ];

        // Create visits
        foreach ($visits as $visit) {
            IvetVisit::create($visit);
        }
    }
}
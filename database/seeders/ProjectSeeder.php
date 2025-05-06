<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create project_images directory if it doesn't exist
        $uploadDir = public_path('project_images');
        if (!File::exists($uploadDir)) {
            File::makeDirectory($uploadDir, 0755, true);
        }

        // Sample projects array
        $projects = [
            [
                'title' => 'Portfolio Website',
                'description' => 'A personal portfolio website built with Laravel and Tailwind CSS showcasing my skills, projects, and professional journey.',
                'technologies' => json_encode(['Laravel', 'PHP', 'Tailwind CSS', 'Alpine.js', 'MySQL']),
                'github_url' => 'https://github.com/username/portfolio',
                'live_url' => 'https://myportfolio.com',
                'image_url' => $this->copyDemoImage('portfolio.jpg', $uploadDir),
                'order' => 1,
            ],
            [
                'title' => 'E-commerce Platform',
                'description' => 'A full-featured e-commerce platform with product management, shopping cart functionality, payment processing, and order tracking.',
                'technologies' => json_encode(['Laravel', 'Vue.js', 'MySQL', 'Stripe API', 'AWS S3']),
                'github_url' => 'https://github.com/username/ecommerce',
                'live_url' => 'https://myshop.example.com',
                'image_url' => $this->copyDemoImage('ecommerce.jpg', $uploadDir),
                'order' => 2,
            ],
            [
                'title' => 'Task Management App',
                'description' => 'A collaborative task management application with real-time updates, task assignment, progress tracking, and deadline notifications.',
                'technologies' => json_encode(['React', 'Node.js', 'Express', 'MongoDB', 'Socket.io']),
                'github_url' => 'https://github.com/username/taskmanager',
                'live_url' => 'https://taskapp.example.com',
                'image_url' => $this->copyDemoImage('taskapp.jpg', $uploadDir),
                'order' => 3,
            ],
            [
                'title' => 'Weather Dashboard',
                'description' => 'An interactive weather dashboard that displays current weather conditions and forecasts for multiple locations using weather API data.',
                'technologies' => json_encode(['JavaScript', 'HTML', 'CSS', 'OpenWeather API', 'Chart.js']),
                'github_url' => 'https://github.com/username/weather-app',
                'live_url' => 'https://weather.example.com',
                'image_url' => $this->copyDemoImage('weather.jpg', $uploadDir),
                'order' => 4,
            ],
            [
                'title' => 'Blog CMS',
                'description' => 'A content management system for blogs with features like markdown editor, categories, tags, comments, and user authentication.',
                'technologies' => json_encode(['Laravel', 'Livewire', 'MySQL', 'TailwindCSS', 'Alpine.js']),
                'github_url' => 'https://github.com/username/blog-cms',
                'live_url' => 'https://myblog.example.com',
                'image_url' => $this->copyDemoImage('blog.jpg', $uploadDir),
                'order' => 5,
            ],
        ];

        // Insert all projects
        foreach ($projects as $project) {
            Project::create($project);
        }
    }

    /**
     * Copy a demo image to the project_images directory
     * 
     * @param string $filename The filename to use
     * @param string $targetDir The target directory
     * @return string The public URL path to the image
     */
    private function copyDemoImage($filename, $targetDir)
    {
        // Create a placeholder image if it doesn't exist
        $targetPath = $targetDir . '/' . $filename;
        
        // If the file doesn't exist, create a placeholder colored rectangle
        if (!File::exists($targetPath)) {
            // Create a 800x500 image
            $image = imagecreatetruecolor(800, 500);
            
            // Generate a random color
            $red = rand(100, 200);
            $green = rand(100, 200);
            $blue = rand(100, 200);
            $color = imagecolorallocate($image, $red, $green, $blue);
            
            // Fill the image
            imagefill($image, 0, 0, $color);
            
            // Add some text
            $textColor = imagecolorallocate($image, 255, 255, 255);
            $text = pathinfo($filename, PATHINFO_FILENAME);
            imagestring($image, 5, 320, 240, $text, $textColor);
            
            // Save the image
            imagejpeg($image, $targetPath, 90);
            imagedestroy($image);
        }
        
        return '/project_images/' . $filename;
    }
}
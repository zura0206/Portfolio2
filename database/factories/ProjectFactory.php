<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Create project_images directory if it doesn't exist
        $uploadDir = public_path('project_images');
        if (!File::exists($uploadDir)) {
            File::makeDirectory($uploadDir, 0755, true);
        }

        // Generate a unique filename
        $filename = uniqid() . '.jpg';
        
        // Create a placeholder image
        $targetPath = $uploadDir . '/' . $filename;
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
        imagestring($image, 5, 320, 240, 'Project Image', $textColor);
        
        // Save the image
        imagejpeg($image, $targetPath, 90);
        imagedestroy($image);

        // Technology stacks to randomly choose from
        $techStacks = [
            ['Laravel', 'PHP', 'MySQL', 'TailwindCSS', 'Alpine.js'],
            ['React', 'Node.js', 'MongoDB', 'Express', 'AWS'],
            ['Vue.js', 'Firebase', 'JavaScript', 'CSS', 'HTML'],
            ['Django', 'Python', 'PostgreSQL', 'Bootstrap', 'jQuery'],
            ['Flask', 'SQLite', 'RESTful API', 'Heroku', 'Git'],
            ['Angular', 'TypeScript', 'Firebase', 'SCSS', 'RxJS']
        ];

        return [
            'title' => $this->faker->catchPhrase(),
            'description' => $this->faker->paragraph(3),
            'technologies' => json_encode($this->faker->randomElement($techStacks)),
            'github_url' => 'https://github.com/username/' . $this->faker->slug(),
            'live_url' => 'https://' . $this->faker->domainName(),
            'image_url' => '/project_images/' . $filename,
            'order' => $this->faker->numberBetween(1, 100),
        ];
    }
}
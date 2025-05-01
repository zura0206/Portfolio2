<?php

namespace Database\Seeders;

use App\Models\Education;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@email.com',
        ]);

        $this->call([
            WorkExperienceSeeder::class,
            IvetSummariesTableSeeder::class,
            IvetVisitsTableSeeder::class,
            EduSeeder::class,
            CertificationSeeder::class,
            HeroSeeder::class,
            SkillSeeder::class,
            AdminUserSeeder::class,
        ]);
    }
}

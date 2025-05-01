<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DeleteImagesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all hero and ivet images';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Storage::disk('public')->deleteDirectory('hero_images');
        Storage::disk('public')->deleteDirectory('ivet_images');

        Storage::disk('public')->makeDirectory('hero_images');
        Storage::disk('public')->makeDirectory('ivet_images');

        $this->info('All images deleted successfully!');
    }
}


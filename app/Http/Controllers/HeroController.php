<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class HeroController extends Controller
{
    public function index()
    {
        $heroes = Hero::all();
        return view('admin.Ahero', compact('heroes'));
    }
    
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'job_title' => 'required|string|max:255',
                'testimonial' => 'required|string',
                'clients_served' => 'required|string|max:50',
                'experience_duration' => 'required|string|max:50',
                'expertise_level' => 'required|string|max:50',
                'profile_image' => 'required|image|mimes:jpeg,png|max:2048',
            ]);

            // Process the image with native GD
            try {
                $file = $request->file('profile_image');
                $extension = strtolower($file->getClientOriginalExtension());
                
                // Create image resource based on file type
                if ($extension === 'png') {
                    $source = @imagecreatefrompng($file->getPathname());
                } elseif ($extension === 'jpeg' || $extension === 'jpg') {
                    $source = @imagecreatefromjpeg($file->getPathname());
                } else {
                    throw new \Exception('Unsupported image format');
                }

                if (!$source) {
                    throw new \Exception('Failed to create image resource');
                }

                // Get image dimensions
                $width = imagesx($source);
                $height = imagesy($source);

                // Create a new true color image
                $image = imagecreatetruecolor($width, $height);
                if (!$image) {
                    imagedestroy($source);
                    throw new \Exception('Failed to create new image');
                }

                // Enable transparency
                imagealphablending($image, false);
                imagesavealpha($image, true);
                $transparent = imagecolorallocatealpha($image, 0, 0, 0, 127);
                imagefill($image, 0, 0, $transparent);

                // Target color (white) and tolerance
                $targetR = 255;
                $targetG = 255;
                $targetB = 255;
                $tolerance = 20; // Adjust for sensitivity (0-255)

                // Copy pixels, making near-white pixels transparent
                for ($x = 0; $x < $width; $x++) {
                    for ($y = 0; $y < $height; $y++) {
                        $rgb = imagecolorat($source, $x, $y);
                        $r = ($rgb >> 16) & 0xFF;
                        $g = ($rgb >> 8) & 0xFF;
                        $b = $rgb & 0xFF;
                        $alpha = ($rgb >> 24) & 0x7F;

                        // Check if pixel is within tolerance of target color
                        if (
                            abs($r - $targetR) <= $tolerance &&
                            abs($g - $targetG) <= $tolerance &&
                            abs($b - $targetB) <= $tolerance &&
                            $alpha === 0 // Only process opaque pixels
                        ) {
                            // Set transparent
                            imagesetpixel($image, $x, $y, $transparent);
                        } else {
                            // Copy original pixel
                            imagesetpixel($image, $x, $y, imagecolorat($source, $x, $y));
                        }
                    }
                }

                // Save the image as PNG
                $filename = uniqid() . '.png';
                $path = 'hero_images/' . $filename;
                $fullPath = storage_path('app/public/' . $path);
                
                if (!imagepng($image, $fullPath)) {
                    throw new \Exception('Failed to save PNG image');
                }

                // Clean up
                imagedestroy($source);
                imagedestroy($image);

                $validated['profile_image'] = $filename;
            } catch (\Exception $e) {
                Log::warning('Background removal failed: ' . $e->getMessage());
                // Fallback: Save original image
                $path = $request->file('profile_image')->store('hero_images', 'public');
                $validated['profile_image'] = basename($path);
            }

            Hero::create($validated);

            return response()->json(['success' => true, 'message' => 'New hero section successfully created']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        }
    }
    
    public function update(Request $request, Hero $hero)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'job_title' => 'required|string|max:255',
                'testimonial' => 'required|string',
                'clients_served' => 'required|string|max:50',
                'experience_duration' => 'required|string|max:50',
                'expertise_level' => 'required|string|max:50',
                'profile_image' => 'nullable|image|mimes:jpeg,png|max:2048',
            ]);

            if ($request->hasFile('profile_image')) {
                // Delete old image if exists
                if ($hero->profile_image) {
                    Storage::disk('public')->delete('hero_images/' . $hero->profile_image);
                }
                // Process the new image with native GD
                try {
                    $file = $request->file('profile_image');
                    $extension = strtolower($file->getClientOriginalExtension());
                    
                    // Create image resource based on file type
                    if ($extension === 'png') {
                        $source = @imagecreatefrompng($file->getPathname());
                    } elseif ($extension === 'jpeg' || $extension === 'jpg') {
                        $source = @imagecreatefromjpeg($file->getPathname());
                    } else {
                        throw new \Exception('Unsupported image format');
                    }

                    if (!$source) {
                        throw new \Exception('Failed to create image resource');
                    }

                    // Get image dimensions
                    $width = imagesx($source);
                    $height = imagesy($source);

                    // Create a new true color image
                    $image = imagecreatetruecolor($width, $height);
                    if (!$image) {
                        imagedestroy($source);
                        throw new \Exception('Failed to create new image');
                    }

                    // Enable transparency
                    imagealphablending($image, false);
                    imagesavealpha($image, true);
                    $transparent = imagecolorallocatealpha($image, 0, 0, 0, 127);
                    imagefill($image, 0, 0, $transparent);

                    // Target color (white) and tolerance
                    $targetR = 255;
                    $targetG = 255;
                    $targetB = 255;
                    $tolerance = 20; // Adjust for sensitivity (0-255)

                    // Copy pixels, making near-white pixels transparent
                    for ($x = 0; $x < $width; $x++) {
                        for ($y = 0; $y < $height; $y++) {
                            $rgb = imagecolorat($source, $x, $y);
                            $r = ($rgb >> 16) & 0xFF;
                            $g = ($rgb >> 8) & 0xFF;
                            $b = $rgb & 0xFF;
                            $alpha = ($rgb >> 24) & 0x7F;

                            // Check if pixel is within tolerance of target color
                            if (
                                abs($r - $targetR) <= $tolerance &&
                                abs($g - $targetG) <= $tolerance &&
                                abs($b - $targetB) <= $tolerance &&
                                $alpha === 0
                            ) {
                                imagesetpixel($image, $x, $y, $transparent);
                            } else {
                                imagesetpixel($image, $x, $y, imagecolorat($source, $x, $y));
                            }
                        }
                    }

                    // Save the image as PNG
                    $filename = uniqid() . '.png';
                    $path = 'hero_images/' . $filename;
                    $fullPath = storage_path('app/public/' . $path);
                    
                    if (!imagepng($image, $fullPath)) {
                        throw new \Exception('Failed to save PNG image');
                    }

                    // Clean up
                    imagedestroy($source);
                    imagedestroy($image);

                    $validated['profile_image'] = $filename;
                } catch (\Exception $e) {
                    Log::warning('Background removal failed: ' . $e->getMessage());
                    // Fallback: Save original image
                    $path = $request->file('profile_image')->store('hero_images', 'public');
                    $validated['profile_image'] = basename($path);
                }
            }

            $hero->update($validated);

            return response()->json(['success' => true, 'message' => 'Hero section successfully updated']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        }
    }
    
    public function destroy(Hero $hero)
    {
        // Delete image if exists
        if ($hero->profile_image) {
            Storage::disk('public')->delete('hero_images/' . $hero->profile_image);
        }

        $hero->delete();

        return response()->json(['success' => true, 'message' => 'Hero section successfully deleted']);
    }
        public function edit(Hero $hero)
    {
        return response()->json($hero);
    }
}
// namespace App\Http\Controllers;

// use App\Models\Hero;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Storage;

// class HeroController extends Controller
// {
//     public function index()
//     {
//         $heroes = Hero::all();
//         return view('admin.Ahero', compact('heroes'));
//     }
    
//     public function store(Request $request)
//     {
//         try {
//             $validated = $request->validate([
//                 'name' => 'required|string|max:255',
//                 'job_title' => 'required|string|max:255',
//                 'testimonial' => 'required|string',
//                 'clients_served' => 'required|string|max:50',
//                 'experience_duration' => 'required|string|max:50',
//                 'expertise_level' => 'required|string|max:50',
//                 'profile_image' => 'required|image|max:2048',
//             ]);

//             $path = $request->file('profile_image')->store('hero_images', 'public');
//             $validated['profile_image'] = basename($path);

//             Hero::create($validated);

//             return response()->json(['success' => true, 'message' => 'New hero section successfully created']);
//         } catch (\Illuminate\Validation\ValidationException $e) {
//             return response()->json(['success' => false, 'errors' => $e->errors()], 422);
//         }
//     }
    
//     public function edit(Hero $hero)
//     {
//         return response()->json($hero);
//     }
    
//     public function update(Request $request, Hero $hero)
//     {
//         try {
//             $validated = $request->validate([
//                 'name' => 'required|string|max:255',
//                 'job_title' => 'required|string|max:255',
//                 'testimonial' => 'required|string',
//                 'clients_served' => 'required|string|max:50',
//                 'experience_duration' => 'required|string|max:50',
//                 'expertise_level' => 'required|string|max:50',
//                 'profile_image' => 'nullable|image|max:2048',
//             ]);

//             if ($request->hasFile('profile_image')) {
//                 // Delete old image
//                 Storage::disk('public')->delete($hero->profile_image);
//                 $path = $request->file('profile_image')->store('hero_images', 'public');
//                 $validated['profile_image'] = basename($path);
//             }

//             $hero->update($validated);

//             return response()->json(['success' => true, 'message' => 'Hero section successfully updated']);
//         } catch (\Illuminate\Validation\ValidationException $e) {
//             return response()->json(['success' => false, 'errors' => $e->errors()], 422);
//         }
//     }
    
//     public function destroy(Hero $hero)
//     {
//         // Delete image if exists
//         if ($hero->profile_image) {
//             Storage::disk('public')->delete($hero->profile_image);
//         }

//         $hero->delete();

//         return response()->json(['success' => true, 'message' => 'Hero section successfully deleted']);
//     }
// }
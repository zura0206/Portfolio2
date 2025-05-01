<?php

use App\Models\Hero;
use App\Models\Skill;
use App\Models\Education;
use App\Models\IvetVisit;
use App\Models\IvetSummary;
use App\Models\Certification;
use App\Models\WorkExperience;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\IvetController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\CertificationController;
use App\Http\Controllers\WorkExperienceController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Public Route
Route::get('/', function () {
    $skills = Skill::all();
    $experiences = WorkExperience::all();
    $visits = IvetVisit::orderBy('date', 'desc')->get();
    $summary = IvetSummary::first();
    $educations = Education::orderBy('duration', 'desc')->get();
    $certifications = Certification::orderBy('cert_year', 'desc')->get();
    $hero = Hero::first();
    return view('index', compact('skills', 'experiences', 'visits', 'summary', 'educations', 'certifications', 'hero'));
})->name('index');



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Admin Routes (require auth, verified, and admin middleware)
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    // Admin Dashboard
    Route::get('/admindashboard', function () {
        $skills = Skill::all();
        $experiences = WorkExperience::all();
        $visits = IvetVisit::orderBy('date', 'desc')->get();
        $summary = IvetSummary::first();
        $educations = Education::orderBy('duration', 'desc')->get();
        $certifications = Certification::orderBy('cert_year', 'desc')->get();
        $hero = Hero::first();
        return view('admin/welcome', compact('skills', 'experiences', 'visits', 'summary', 'educations', 'certifications', 'hero'));
    })->name('admin.Awelcome');

    // Skills
    Route::get('/skills', function () {
        $skills = Skill::all();
        return view('admin/Askills', compact('skills'));
    })->name('admin.Askills');
    Route::resource('skills', SkillController::class)->except(['index', 'show']);
    Route::get('/skills/{skill}/edit', function (Skill $skill) {
        return response()->json($skill);
    });

    // Work Experiences
    Route::get('/wk', [WorkExperienceController::class, 'index'])->name('admin.Awk');
    Route::resource('work-experiences', WorkExperienceController::class)->except(['index', 'show', 'create', 'edit']);
    Route::get('/work-experiences/{experience}/edit', function (WorkExperience $experience) {
        return response()->json($experience);
    });

    // Education and Certifications
    Route::get('/EC', function () {
        $educations = Education::all();
        $certifications = Certification::orderBy('cert_year', 'desc')->get();
        return view('admin/Aedu_cert', compact('certifications', 'educations'));
    })->name('admin.EC');
    Route::post('/education', [EducationController::class, 'store']);
    Route::put('/EC/{education}', [EducationController::class, 'update'])->name('admin.education.update');
    Route::delete('/EC/{education}', [EducationController::class, 'destroy'])->name('admin.education.destroy');
    Route::post('/certifications', [CertificationController::class, 'store'])->name('certifications.store');
    Route::get('/certifications/{id}', [CertificationController::class, 'show'])->name('certifications.show');
    Route::put('/certifications/{id}', [CertificationController::class, 'update'])->name('certifications.update');
    Route::delete('/certifications/{id}', [CertificationController::class, 'destroy'])->name('certifications.destroy');

    // IVET Routes
    Route::get('/ivet', [IvetController::class, 'adminIndex'])->name('admin.Aivet');
    Route::post('/ivet', [IvetController::class, 'store']);
    Route::get('/ivet/{visit}/edit', [IvetController::class, 'edit']);
    Route::put('/ivet/{visit}', [IvetController::class, 'update']);
    Route::delete('/ivet/{visit}', [IvetController::class, 'destroy']);
    Route::post('/ivet-summary', [IvetController::class, 'storeSummary']);
    Route::put('/ivet-summary/{id}', [IvetController::class, 'updateSummary']);
    Route::delete('/ivet-summary/{id}', [IvetController::class, 'destroySummary']);

    // Hero Section
    Route::get('/hero', function () {
        $heroes = Hero::all();
        return view('admin/Ahero', compact('heroes'));
    })->name('admin.Ahero');
    Route::post('/hero', [HeroController::class, 'store'])->name('admin.hero.store');
    Route::get('/hero/{hero}/edit', [HeroController::class, 'edit'])->name('admin.hero.edit');
    Route::put('/hero/{hero}', [HeroController::class, 'update'])->name('admin.hero.update');
    Route::delete('/hero/{hero}', [HeroController::class, 'destroy'])->name('admin.hero.destroy');
});

// Logout Route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Breeze Authentication Routes
require __DIR__.'/auth.php';
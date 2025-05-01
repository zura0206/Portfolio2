<?php

namespace App\Http\Controllers;

use App\Models\WorkExperience;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    public function index()
    {
        $experiences = WorkExperience::all();
        return view('admin.Awk', compact('experiences'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'description' => 'required|string',
            'responsibilities' => 'required',
        ]);
        
        $responsibilities = array_filter(
            array_map('trim', explode("\n", $request->responsibilities)),
            fn($item) => !empty($item)
        );
        $experience = WorkExperience::create($validated);

        return response()->json([
            'success' => true,
            'experience' => $experience
        ]);
    }

    public function edit(WorkExperience $workExperience)
    {
        return response()->json($workExperience);
    }

    public function update(Request $request, WorkExperience $workExperience)
    {
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'period' => 'required|string|max:255',
            'description' => 'required|string',
            'responsibilities' => 'required',
        ]);

        $responsibilities = array_filter(
            array_map('trim', explode("\n", $request->responsibilities)),
            fn($item) => !empty($item)
        );

        $workExperience->update($validated);

        return response()->json([
            'success' => true,
            'experience' => $workExperience
        ]);
    }

    public function destroy(WorkExperience $workExperience)
    {
        $workExperience->delete();
        return response()->json(['success' => true]);
    }
}
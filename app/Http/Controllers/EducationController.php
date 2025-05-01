<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $education = Education::first();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course' => 'required|string|max:255',
            'school_name' => 'required|string|max:255',
            'duration' => 'required',
            'description' => 'required'
        ]);
    
        $education = Education::create($validated);
    
        return response()->json([
            'success' => true,
            'message' => 'Education created successfully',
            'data' => $education
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'course' => 'required|string|max:255',
            'school_name' => 'required|string|max:255',
            'duration' => 'required',
            'description' => 'required'
        ]);
    
        $education->update($validated);
    
        return response()->json([
            'success' => true,
            'message' => 'Education created successfully',
            'data' => $education
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        $education->delete();
        return redirect()->route('admin.EC')
            ->with('success', 'Education deleted successfully');
    }
}



<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tools' => 'required|string|max:255',
            'percentage' => 'required|integer|min:0|max:100',
        ]);
    
        $skill = Skill::create($validated);
    
        return response()->json([
            'success' => true,
            'skill' => $skill
        ]);
    }
    
    public function update(Request $request, Skill $skill)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tools' => 'required|string|max:255',
            'percentage' => 'required|integer|min:0|max:100',
        ]);
    
        $skill->update($validated);
    
        return response()->json([
            'success' => true,
            'skill' => $skill
        ]);
    }
    
    public function destroy(Skill $skill)
    {
        $skill->delete();
        return response()->json(['success' => true]);
    }
    
    public function edit(Skill $skill)
    {
        return response()->json($skill);
    }
}
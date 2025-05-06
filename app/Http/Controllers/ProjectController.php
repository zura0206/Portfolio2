<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    // Admin view
    public function adminIndex()
    {
        $projects = Project::orderBy('order', 'asc')->get();
        return view('admin.Aproject', compact('projects'));
    }

    // Store new project
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'technologies' => 'required|string',
            'github_url' => 'nullable|url|max:255',
            'live_url' => 'nullable|url|max:255',
            'order' => 'nullable|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);

        $data = $request->except('image', 'technologies');
        // Convert comma-separated technologies to array
        $data['technologies'] = json_encode(array_map('trim', explode(',', $request->technologies)));

        if ($request->hasFile('image')) {
            // Create directory if it doesn't exist
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/project_images/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            
            $data['image_url'] = '/project_images/' . $filename;
        }

        Project::create($data);
        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'technologies' => 'required|string',
            'github_url' => 'nullable|url|max:255',
            'live_url' => 'nullable|url|max:255',
            'order' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        $data = $request->except('image', 'technologies', '_method');
        // Convert comma-separated technologies to array
        $data['technologies'] = json_encode(array_map('trim', explode(',', $request->technologies)));

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($project->image_url && file_exists($_SERVER['DOCUMENT_ROOT'] . $project->image_url)) {
                unlink($_SERVER['DOCUMENT_ROOT'] . $project->image_url);
            }
            
            // Create directory if it doesn't exist
            $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/project_images/';
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move($uploadDir, $filename);
            
            $data['image_url'] = '/project_images/' . $filename;
        }

        $project->update($data);
        return response()->json(['success' => true]);
    }

    // Delete project
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        
        // Delete image if exists
        if ($project->image_url && file_exists($_SERVER['DOCUMENT_ROOT'] . $project->image_url)) {
            unlink($_SERVER['DOCUMENT_ROOT'] . $project->image_url);
        }
        
        $project->delete();
        return response()->json(['success' => true]);
    }

    // Get project for editing
    public function edit($id)
    {
        return response()->json(Project::findOrFail($id));
    }
}
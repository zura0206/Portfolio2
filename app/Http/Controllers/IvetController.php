<?php

namespace App\Http\Controllers;

use App\Models\IvetVisit;
use App\Models\IvetSummary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IvetController extends Controller
{
    // Admin view
    public function adminIndex()
    {
        $visits = IvetVisit::orderBy('date', 'desc')->get();
        $summary = IvetSummary::first();
        return view('admin.Aivet', compact('visits', 'summary'));
    }

    // Store new visit
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'description' => 'required|string',
            'key_takeaways' => 'required|string',
            'reflection' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->except('image', 'key_takeaways');
        $data['key_takeaways'] = array_filter(
            array_map('trim', explode("\n", $request->key_takeaways)),
            fn($item) => !empty($item)
        );

        if ($request->hasFile('image')) {
            $data['image_url'] = Storage::url($request->file('image')->store('ivet_images', 'public'));
        }

        IvetVisit::create($data);
        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
{
    $visit = IvetVisit::findOrFail($id);

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'date' => 'required|string|max:255',
        'description' => 'required|string',
        'key_takeaways' => 'required|string',
        'reflection' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $data = $request->except('image', 'key_takeaways', '_method');
    $data['key_takeaways'] = array_filter(
        array_map('trim', explode("\n", $request->key_takeaways)),
        fn($item) => !empty($item)
    );

    if ($request->hasFile('image')) {
        if ($visit->image_url) {
            Storage::disk('public')->delete(str_replace('/storage', '', $visit->image_url));
        }
        $data['image_url'] = Storage::url($request->file('image')->store('ivet_images', 'public'));
    }

    $visit->update($data);
    return response()->json(['success' => true]);
}

    // Delete visit
    public function destroy($id)
    {
        $visit = IvetVisit::findOrFail($id);
        if ($visit->image_url) {
            Storage::disk('public')->delete(str_replace('/storage', '', $visit->image_url));
        }
        $visit->delete();
        return response()->json(['success' => true]);
    }

    // Get visit for editing
    public function edit($id)
    {
        return response()->json(IvetVisit::findOrFail($id));
    }

    // Update summary// app/Http/Controllers/IvetController.php

public function storeSummary(Request $request)
{
    $validated = $request->validate([
        'professional_skills' => 'required|string',
        'networking' => 'required|string',
        'trend_awareness' => 'required|string',
        'personal_growth' => 'required|string',
    ]);

    $summary = IvetSummary::create($validated);

    return response()->json([
        'success' => true,
        'message' => 'Summary created successfully',
        'id' => $summary->id
    ]);
}

public function updateSummary(Request $request, $id)
{
    $validated = $request->validate([
        'professional_skills' => 'required|string',
        'networking' => 'required|string',
        'trend_awareness' => 'required|string',
        'personal_growth' => 'required|string',
    ]);

    $summary = IvetSummary::findOrFail($id);
    $summary->update($validated);

    return response()->json([
        'success' => true,
        'message' => 'Summary updated successfully'
    ]);
}

public function destroySummary($id)
{
    $summary = IvetSummary::findOrFail($id);
    $summary->delete();

    return response()->json([
        'success' => true,
        'message' => 'Summary deleted successfully'
    ]);
}
}
<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CertificationController extends Controller
{
    public function index()
    {
        $certifications = Certification::all();
        return view('admin.certifications.index', compact('certifications'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cert_title' => 'required|string|max:255',
            'cert_issuer' => 'required|string|max:255',
            'cert_year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'cert_description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $certification = Certification::create($request->all());

        return response()->json([
            'message' => 'Certification created successfully!',
            'certification' => $certification,
        ], 201);
    }

    public function show($id)
    {
        $certification = Certification::findOrFail($id);
        return response()->json($certification);
    }

    public function update(Request $request, $id)
    {
        $certification = Certification::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'cert_title' => 'required|string|max:255',
            'cert_issuer' => 'required|string|max:255',
            'cert_year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'cert_description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $certification->update($request->all());

        return response()->json([
            'message' => 'Certification updated successfully!',
            'certification' => $certification,
        ]);
    }

    public function destroy($id)
    {
        $certification = Certification::findOrFail($id);
        $certification->delete();

        return redirect()->
        route('admin.EC')
        ->with('success', 'Education deleted successfully');
}
}
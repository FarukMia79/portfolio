<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resume;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resumes = Resume::latest()->get();
        return response()->json($resumes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateDate = $request->validate([
            'type' => 'required',
            'title' => 'required',
            'institution' => 'required',
            'period' => 'required',
            'result' => 'required',
            'description' => 'nullable',
            'status' => 'required',
        ]);
        
        $resume = Resume::create($validateDate);
        
        return response()->json($resume, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $resume = Resume::find($id);
        return response()->json($resume);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateDate = $request->validate([
            'type' => 'required',
            'title' => 'required',
            'institution' => 'required',
            'period' => 'required',
            'result' => 'required',
            'description' => 'nullable',
            'status' => 'required',
        ]);
        
        $resume = Resume::find($id);
        $resume->update($validateDate);
        
        return response()->json($resume);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $resume = Resume::find($id);
        $resume->delete();
        
        return response()->json(null, 204);
    }
}

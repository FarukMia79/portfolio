<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::latest()->get();
        return response()->json($skills);
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
        $validatedData = $request->validate([
            'name' => 'required|string|unique:skills,name|max:255',
            'category' => 'required|string|max:255',
            'level' => 'required|integer|min:0|max:100',
            'icon'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status'=> 'required|string|max:255',
        ]);

        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $iconName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $uploadPath = public_path('uploads/icons/');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image->resize(50, 50);
            $image->save($uploadPath . $iconName);

            $validatedData['icon'] = 'uploads/icons/' . $iconName;

            
        }

        $skill = Skill::create($validatedData);

        return response()->json($skill, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $skill = Skill::find($id);
        return response()->json($skill);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

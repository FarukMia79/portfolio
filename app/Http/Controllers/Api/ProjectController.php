<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::latest()->get();
        return response()->json($projects);
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
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $image = $request->file('image');

            $img = $manager->read($image->getRealPath());
            $img->resize(314, 238);

            $imagePath = public_path('uploads/images/');
            if (!file_exists($imagePath)) {
                mkdir($imagePath, 0755, true);
            }


            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $img->save($imagePath . $imageName);
            $validatedData['image'] = 'uploads/images/' . $imageName;
        }

        $project = Project::create($validatedData);
        return response()->json($project, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::find($id);
        return response()->json($project);
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
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status' => 'required|string|max:255',
        ]);

        $project = Project::find($id);

        if ($request->hasFile('image')) {
            if ($project->image && file_exists(public_path($project->image))) {
                unlink(public_path($project->image));
            }

            $file = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $uploadPath = public_path('uploads/images/');

            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Image Intervention
            $manager = new ImageManager(new Driver());
            $image = $manager->read($file);
            $image->resize(314, 238);
            $image->save($uploadPath . $imageName);

            $validatedData['image'] = 'uploads/images/' . $imageName;
        }

        $project->update($validatedData);
        return response()->json($project);
    }

    public function destroy(string $id)
    {
        $project = Project::find($id);
        if ($project) {
            if ($project->image && file_exists(public_path($project->image))) {
                unlink(public_path($project->image));
            }
            $project->delete();
            return response()->json(['message' => 'Project deleted successfully']);
        }
        return response()->json(['message' => 'Not found'], 404);
    }
}

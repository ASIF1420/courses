<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::get();
        return view('materials.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course = Course::create([
            'title' => $request->course_title,
            'status' => $request->course_status,
            'description' => $request->description,
            'department' => $request->department,
            'designation' => $request->designation,
            'brand' => $request->brand,
        ]);
    
        // Save modules
        if (isset($request->modules)) {
            foreach ($request->modules as $moduleData) {
                $module = $course->modules()->create([
                    'title' => $moduleData['title'],
                    'status' => $moduleData['status'],
                    'description' => $moduleData['description'],
                    'interaction' => $moduleData['interaction'] ?? null,
                    'duration' => $moduleData['duration'] ?? null,
                ]);
        
                // Save materials
                if (isset($moduleData['materials'])) {
                    foreach ($moduleData['materials'] as $materialData) {
                        $module->materials()->create([
                            'type' => $materialData['type'],
                            'file' => $materialData['type'] === 'file' ? $materialData['file'] : null,
                            'link' => $materialData['type'] === 'link' ? $materialData['link'] : null,
                        ]);
                    }
                }
        
                // Save questions
                if (isset($moduleData['questions'])) {
                    foreach ($moduleData['questions'] as $questionData) {
                        $module->questions()->create([
                            'text' => $questionData['text'],
                            'status' => $questionData['status'],
                        ]);
                    }
                }
            }
        }
    
        return redirect()->back()->with('success', 'Course and its modules saved successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\In;

class courseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('instructor')->get();
        return view('Admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('Admin.course.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'instructorId' => 'required|exists:instructors,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);
        $input = $request->except(['image']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('instructors', 'public');
            $input['pictureUrl'] = Storage::url($imagePath);
        }

        Course::create($input);

        return redirect()->route('course.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('Admin.course.details', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        $instructors=Instructor::all();
        return view('Admin.course.edit', compact(['course','instructors']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
      $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'instructorId' => 'required|exists:instructors,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);
        $input = $request->except(['image']);
        if ($request->hasFile('image')) {
            if($course->pictureUrl){
                Storage::disk('public')->delete(str_replace('/storage','public',$course->pictureUrl));
            }
            $image = $request->file('image');
            $imagePath = $image->store('courses', 'public');
            $input['pictureUrl'] = Storage::url($imagePath);
        }

        $course->update($input);

        return redirect()->route('course.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        if($course->pictureUrl){
                Storage::disk('public')->delete(str_replace('/storage','public',$course->pictureUrl));
            }
        $course->delete();
        return redirect()->route('course.index')->with('success', 'Course deleted successfully.');
    }
}

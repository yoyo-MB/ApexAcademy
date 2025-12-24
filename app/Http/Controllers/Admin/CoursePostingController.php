<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CoursePosting;
use App\Models\Instructor;
use Illuminate\Http\Request;

class CoursePostingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postings = CoursePosting::with(['course', 'instructor'])->get();
        return view('admin.course_postings.index', compact('postings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $instructors = Instructor::all();
        $courses = Course::all();
        return view('admin.course_postings.create', compact('instructors', 'courses'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'instructor_id' => 'required|exists:instructors,id',
            'status' => 'required|in:active,inactive,pending',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'max_students' => 'nullable|integer|min:1',
            'notes' => 'nullable|string',
        ]);
        
        CoursePosting::create($validated);
        return redirect()->route('admin.course_postings.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $CoursePosting = CoursePosting::with(['course', 'instructor'])->findOrFail($id);
        return view('admin.course_postings.show', compact('CoursePosting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coursePosting = CoursePosting::findOrFail($id);
        $instructors = Instructor::all();
        $courses = Course::all();
        return view('admin.course_postings.edit', compact('coursePosting', 'instructors', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'instructor_id' => 'required|exists:instructors,id',
            'status' => 'required|in:active,inactive,pending',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
            'max_students' => 'nullable|integer|min:1',
            'notes' => 'nullable|string',
        ]);
        
        $coursePosting = CoursePosting::findOrFail($id);
        $coursePosting->update($validated);
        return redirect()->route('admin.course_postings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coursePosting = CoursePosting::findOrFail($id);
        $coursePosting->delete();
        return redirect()->route('admin.course_postings.index');
    }
}

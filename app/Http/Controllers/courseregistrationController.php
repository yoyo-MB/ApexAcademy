<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseRegistrations;
use Illuminate\Http\Request;
use NoCaptcha;

class courseregistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course_registrations = CourseRegistrations::with('course:id,title')->get();
        return view('course_registrations.index', compact('course_registrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
$courses = \App\Models\Course::all();
        return view('course_registrations.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        CourseRegistrations::create($validated);
        return redirect()->route('course_registrations.success')->with('success', 'Course registration created successfully.');
    }

    /**
     * Show success page after registration.
     */
    public function success()
    {
        return view('course_registrations.success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course_registration = CourseRegistrations::with('course')->findOrFail($id);
        return view('course_registrations.show', compact('course_registration'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course_registration = CourseRegistrations::findOrFail($id);
        $courses = Course::all();
        return view('course_registrations.edit', compact('course_registration', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
        ]);
        $course_registration = CourseRegistrations::findOrFail($id);
        $course_registration->update($validated);
        return redirect()->route('course_registrations.index')->with('success', 'Course registration updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course_registration = CourseRegistrations::findOrFail($id);
        $course_registration->delete();
        return redirect()->route('course_registrations.index')->with('success', 'Course registration deleted successfully.');
    }
}

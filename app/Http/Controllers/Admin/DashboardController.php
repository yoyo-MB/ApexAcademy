<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseRegistrations;
use App\Models\Instructor;
use App\Models\Contact_us;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_courses' => Course::count(),
            'total_instructors' => Instructor::count(),
            'total_registrations' => CourseRegistrations::count(),
            'total_contact_messages' => Contact_us::count(),
            'recent_registrations' => CourseRegistrations::with('course')
                ->latest()
                ->take(5)
                ->get(),
            'recent_contact_messages' => Contact_us::latest()
                ->take(5)
                ->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}

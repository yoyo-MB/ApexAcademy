<?php

use App\Http\Controllers\Admin\courseController;
use App\Http\Controllers\Admin\instructorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\courseregistrationController;
use App\Http\Controllers\authController;
use App\Http\Controllers\homeController;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Support\Facades\Route; 

Route::get('/', function () {
    $homeCourses = Course::latest()->take(3)->get();
    return view('home', compact('homeCourses'));
})->name('home');

Route::view('/about', 'about')->name('about');
Route::get('/courses', function () {
    $courses = Course::latest()->get();
    return view('courses', compact('courses'));
})->name('courses');

// Public course detail page (accepts slug or numeric id)
Route::get('/courses/{course}', function (Course $course) {
    return view('courses.show', compact('course'));
})->name('courses.show');

// Instructors index (public)
Route::get('/instructors', function () {
    $instructors = Instructor::all();
    return view('instructors', compact('instructors'));
})->name('instructors');

Route::get('/instructors/{instructor}', function (Instructor $instructor) {
    return view('instructors.show', compact('instructor'));
})->name('instructors.show');

Route::view('/contact', 'contact')->name('contact');

// Handle contact form submission
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
Route::post('contact', function (Request $request) {
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'subject' => 'nullable|string|max:255',
        'message' => 'required|string',
    ]);

    // Log the message for now (or replace with Mail::send / store in DB)
    Log::info('Contact form submitted', $data);

    return redirect()->route('contact')->with('success', 'رسالتك أرسلت بنجاح. شكرا لكم!');
})->name('contact.submit');



Route::get('/admin', function () {
    return redirect()->route('admin.login');
});

// Authentication routes
Route::get('login', [authController::class, 'showLogin'])->name('login');
Route::get('adminlogin', [authController::class, 'showLogin'])->name('admin.login');
Route::post('login', [authController::class, 'login']);
Route::get('register', [authController::class, 'registerForm'])->name('register');
Route::post('register', [authController::class, 'register']);

Route::middleware(['web', 'auth:admin'])->group(function () {
    Route::post('logout', [authController::class, 'logout'])->name('logout');
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::resource('instructor', instructorController::class)->names([
        'index'=>'instructor.index',
        'create'=>'instructor.create',
        'show'=>'instructor.show',
        'edit'=>'instructor.edit',
        'store'=>'instructor.store',
        'update'=>'instructor.update',
        'destroy'=>'instructor.destroy',
    ]);

    Route::resource('course', courseController::class)->names([
        'index' => 'course.index',
        'create' => 'course.create',
        'show' => 'course.show',
        'edit' => 'course.edit',
        'store' => 'course.store',
        'update' => 'course.update',
        'destroy' => 'course.destroy',
    ]);

    // Course registration management routes
    Route::get('course-registrations', [courseregistrationController::class, 'index'])->name('course_registrations.index');
    Route::get('course-registrations/{id}', [courseregistrationController::class, 'show'])->name('course_registrations.show');
    Route::delete('course-registrations/{id}', [courseregistrationController::class, 'destroy'])->name('course_registrations.destroy');
});


// Public course registration routes (no authentication required)
Route::get('course-registration', [courseregistrationController::class, 'create'])->name('course_registrations.create');
Route::post('course-registration', [courseregistrationController::class, 'store'])->name('course_registrations.store');
Route::get('course-registration/success', [courseregistrationController::class, 'success'])->name('course_registrations.success');



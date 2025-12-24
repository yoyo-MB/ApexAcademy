<?php

use App\Http\Controllers\Admin\courseController;
use App\Http\Controllers\Admin\instructorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\courseregistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return redirect()->route('admin.dashboard');
});
//Route::middleware(['web'])->group(function () {
    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::resource('instructor', instructorController::class)->names([
        'index'=>'instructor.index',
        'create'=>'instructor.create',
        'show'=>'instructor.show',
        'edit'=>'instructor.edit',
        'store'=>'instructor.store',
        'update'=>'instructor.update',
        'destory'=>'instructor.destory',
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
    Route::get('course-registrations/{id}/edit', [courseregistrationController::class, 'edit'])->name('course_registrations.edit');
    Route::put('course-registrations/{id}', [courseregistrationController::class, 'update'])->name('course_registrations.update');
    Route::delete('course-registrations/{id}', [courseregistrationController::class, 'destroy'])->name('course_registrations.destroy');
//});


// Public course registration routes (no authentication required)
Route::get('course-registration', [courseregistrationController::class, 'create'])->name('course_registrations.create');
Route::post('course-registration', [courseregistrationController::class, 'store'])->name('course_registrations.store');
Route::get('course-registration/success', [courseregistrationController::class, 'success'])->name('course_registrations.success');



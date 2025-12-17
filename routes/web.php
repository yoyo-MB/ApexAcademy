<?php

use App\Http\Controllers\Admin\courseController;
use App\Http\Controllers\Admin\instructorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('instructor',instructorController::class)->names([
    'index'=>'instructor.index',
    'create'=>'instructor.create',
    'show'=>'instructor.show',
    'edit'=>'instructor.edit',
    'store'=>'instructor.store',
    'update'=>'instructor.update',
    'destory'=>'instructor.destory',

]);

Route::resource('course',courseController::class)->names([
    'index'=>'course.index',
    'create'=>'course.create',
    'show'=>'course.show',
    'edit'=>'course.edit',
    'store'=>'course.store',
    'update'=>'course.update',
    'destory'=>'course.destory',

]);

<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class homeController extends Controller
{
     public function index()
    {
        // Provide `$homeCourses` to the home view and eager-load the single instructor relation
        $homeCourses = Course::with('instructor')->latest()->get();

        return view('home', compact('homeCourses'));
    }
     
}

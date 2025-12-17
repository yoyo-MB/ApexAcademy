<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\HttpCache\Store;

class instructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors=Instructor::all();
        return view("Admin.Instructor.index",compact("instructors"));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("Admin.Instructor.create"); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string',
            'yearsOfExperience' => 'required|integer|min:0',
            'speciality' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);
        $input = $request->except(['image']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('instructors', 'public');
            $input['pictureUrl'] = Storage::url($imagePath);
        }

        Instructor::create($input);

        return redirect()->route('instructor.index')->with('success', 'Instructor created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Instructor $instructor)
    {
         return view('Admin.Instructor.details', compact('instructor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Instructor $instructor)
    {
           return view('Admin.Instructor.edit',compact("instructor"));
  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Instructor $instructor)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string',
            'yearsOfExperience' => 'required|integer|min:0',
            'speciality' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);
        $input = $request->except(['image']);
        if ($request->hasFile('image')) {
            if($instructor->pictureUrl){
                Storage::disk('public')->delete(str_replace('/storage','public',$instructor->pictureUrl));
            }
            $image = $request->file('image');
            $imagePath = $image->store('instructors', 'public');
            $input['pictureUrl'] = Storage::url($imagePath);
        }

        $instructor->update($input);

        return redirect()->route('instructor.index')->with('success','instructor updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instructor $instructor)
    {
        if($instructor->pictureUrl){
                Storage::disk('public')->delete(str_replace('/storage','public',$instructor->pictureUrl));
            }
        $instructor->delete();
         return redirect()->route('instructor.index')->with('success','instructor deleted successfully!'); 
            
    }
}

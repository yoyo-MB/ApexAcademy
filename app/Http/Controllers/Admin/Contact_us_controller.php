<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact_us;
use Illuminate\Http\Request;
use NoCaptcha;

class Contact_us_controller extends Controller
{
    public function index()
    {
        $contacts = Contact_us::all();
        return view('admin.contact_us.index', compact('contacts'));
    }
    public function show($id)
    {
        $contact = Contact_us::findOrFail($id);
        return view('admin.contact_us.show', compact('contact'));
    }
    public function create(){
        return view('contact');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        Contact_us::create($validated);
        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }

}

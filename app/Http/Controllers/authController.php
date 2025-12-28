<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // Try admin login first
        $admin = Admin::where('email', $credentials['email'])->first();
        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin.dashboard');
        }

        // Fallback to normal user
        $user = User::where('email', $credentials['email'])->first();
        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::guard('web')->login($user);
            return redirect()->route('admin.dashboard');
        }
         return back()->with('error','Invalid credentials');
    }
    public function logout(Request $request)
    {
        // Logout from whichever guard is authenticated
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect()->route('login');
    }
    public function registerForm(){
        return view('auth.register');
    }
    public function register(Request $request){
        $input=$request->validate(['name'=>'required|string|max:255',
        'email'=>'required|email|unique:users,email',
        'password'=>'required|min:6|confirmed']);
        $password=Hash::make($input['password']);
        $user=User::create([
            'name'=>$input['name'],
            'email'=>$input['email'],
            'password'=>$password
        ]);
        return redirect()->route('login')->with('success','Admin registration successful. Please login.');
    }
}

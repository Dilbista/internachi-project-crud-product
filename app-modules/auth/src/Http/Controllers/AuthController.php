<?php

namespace Modules\Auth\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Notifications\UserRegister;

class AuthController
{
    //
    public function show()
    {

        return view('auth::authentication.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        
        $user = User::where('email', $request->input('email'))->first();
        $user->notify(new UserRegister());


        return redirect()
            ->route('login')
            ->with('success', 'Registration successful');
    }



    public function View_login()


    {
        // DD(('here'));
        
        return view('auth::authentication.login');
    }
       public function login(Request $request)
    {
        // Validate input
        $credentials = $request->validate([
          'email' => 'required|email|',
            'password' => 'required|',
        ]);

        // Attempt authentication
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

              return redirect()
            ->route('dashboard')
            ->with('success', 'logging successful');
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'Invalid credentials provided.',
        ])->onlyInput('email');
    }

    public function Dashboard()
    {
        if (Auth::check()) {
            // $data = [
            //     'userCount' => 100,
            //     'sales' => 50,
            //     'messages' => 10,
            // ];


            return view('auth::dashboard');
        }

        return redirect('/login')->with('error', 'You must be logged in to access the dashboard');
    }



    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logged out successfully');
    }

}

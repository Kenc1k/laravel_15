<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }

    public function registerPage()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // dd(123);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:5',
        ]);
        // dd($request->all());
        $data['password'] = bcrypt($data['password']);
        
        $user = User::create($data);
        Auth::login($user);
        $rand_number = rand(10000, 99999);

        Store::create([
            'user_id' => Auth::user()->id,
            'number' => $rand_number
        ]);

        $email = new EmailCheckController();
        $email->sendCode(Auth::user()->id, [$rand_number]);

        return redirect()->route('check.code')->with('success', 'Registration successful! Please log in.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        
        
        if (Auth::attempt($credentials)) {
            return redirect('/users');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginPage');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller
{
    public function index()
    {
        return view('app.home', [
            'link' => 'https://www.twitch.tv/poletechpulv'
        ]);
    }

    /**
     * Display login page
     * @return void
     */
    public function login()
    {
        return view('app.login');
    }

    /**
     * Check the parameters of the association and if all is ok, log it
     * @param Request $request
     * @return void
     */
    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('association.edit', Association::where('email', $request->email)->first());
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Logout association login
     * @return void
     */
    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}

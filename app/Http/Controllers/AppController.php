<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);
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

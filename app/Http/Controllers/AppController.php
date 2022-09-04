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
}

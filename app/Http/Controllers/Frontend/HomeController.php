<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home');

    }
    public function login()
    {
        return view('frontend.login');

    }

    public function protected()
    {
        return view('frontend.protected');
    }
}

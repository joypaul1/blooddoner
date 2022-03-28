<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
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

    public function aboutUs()
    {
        $aboutus= Aboutus::first();
        return view('frontend.aboutuse', compact('aboutus'));
    }
    public function registration()
    {
        return view('frontend.registration');
    }

    public function protected()
    {

        return view('frontend.protected');
    }
}

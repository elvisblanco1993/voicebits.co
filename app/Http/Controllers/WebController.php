<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
        return view('website.home');
    }

    public function multipleShows()
    {
        return view('website.multiple-shows');
    }

    public function about()
    {
        return view('website.about');
    }

    public function pricing()
    {
        return view('website.pricing');
    }
}

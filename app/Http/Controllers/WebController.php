<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
        return view('web.website.home');
    }

    public function multipleShows()
    {
        return view('web.website.multiple-shows');
    }

    public function about()
    {
        return view('web.website.about');
    }

    public function pricing()
    {
        return view('web.website.pricing');
    }
}

<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    /**
     * Landing page + CTA
     */
    public function index()
    {
        
        $ctaUrl = route('stories.index');

        return view('home', compact('ctaUrl'));
    }
}
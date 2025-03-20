<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Z3d0X\FilamentFabricator\Models\Page;

class PagesController extends Controller
{

    /**
     * Show the profile for a given user.
     */
    public function index()
    {
        $featuredPages = Page::where('featured', true)
            ->with(['destination:id,city,country']) // Load only city & country from destinations
            ->get(['id', 'featured_image', 'title', 'slug', 'destination_id'])->toArray(); // Get only needed columns from pages

        return view('home', compact('featuredPages'));
    }
}
<?php

use Firefly\FilamentBlog\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about-us', function () {

    $posts = $posts = Post::query()
        ->with(['categories', 'user'])
        ->published()
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();
    ;

    return view('about', ['posts' => $posts]);
})->name('about');

Route::get('/contact-us', function () {
    return view('contact');
})->name('contact');
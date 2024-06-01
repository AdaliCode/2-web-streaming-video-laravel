<?php

use App\Models\Video;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $top10videos = Video::paginate(10)->sortByDesc('rating');
    return view('home', ['top10videos' => $top10videos]);
});

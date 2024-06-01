<?php

use App\Models\Video;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $videos = Video::all();
    return view('home', ['videos' => $videos]);
});

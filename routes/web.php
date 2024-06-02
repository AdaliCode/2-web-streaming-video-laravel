<?php

use App\Models\Video;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

Route::get('/', function () {
    $top10videos = Video::paginate(10)->sortByDesc('rating');
    $series = Video::query()->where('category', 'series')->paginate(8);
    $variety = Video::query()->where('category', 'variety')->paginate(4);
    // dd($series);
    return view('home', [
        'top10videos' => $top10videos,
        'seriesvideos' => $series,
        'variety' => $variety,
    ]);
});

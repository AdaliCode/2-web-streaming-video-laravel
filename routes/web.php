<?php

use App\Models\Category;
use App\Models\Video;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;


Route::get('/', function () {
    $top10videos = Category::with(['videos' => function ($query) {
        $query->orderBy('rating', 'desc')->paginate(10);
    }])->where(function ($query) {
        $query->where('name', '=', 'Drama Korea')
            ->orWhere('name', '=', 'Variety Show Korea');
    })->get();
    $comingSoon = Category::with(['videos' => function ($query) {
        $query->orderBy('release', 'ASC')->where('episodeNow', 0)->paginate(4);
    }])->get();
    function categoryVideo($item = 8, $categoryName = 'Drama Korea')
    {
        $categoryVideo = Category::with(['videos' => function ($query) use ($item) {
            $query->paginate($item);
        }])->where(function ($query) use ($categoryName) {
            $query->where('name', '=', $categoryName);
        })->get();
        return $categoryVideo;
    }
    return view('home', [
        'top10videos' => $top10videos,
        'seriesvideos' => categoryVideo(),
        'variety' => categoryVideo(4, 'Variety Show Korea'),
        'comingSoon' => $comingSoon,
        'romanceGenre' => categoryVideo(8, 'Romance'),
    ]);
});

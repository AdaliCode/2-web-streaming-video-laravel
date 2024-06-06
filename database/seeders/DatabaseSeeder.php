<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use App\Models\Video;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(VideoSeeder::class);
        $this->call(CategorySeeder::class);

        // category attach video
        function syncVideo($nameCategory = 'romance', $syncVideo = [2, 4, 5])
        {
            $category = Category::find($nameCategory);
            $category->videos()->sync($syncVideo);
        }
        syncVideo();
        syncVideo('drama-korea', [1, 2, 3, 4, 5, 6]);
        syncVideo('sbs', 7);
        syncVideo('variety-show-korea', 7);

        // video sync category
        function syncCategory($videoTitle = 7, $syncCategory = ['variety-show-korea', 'sbs'])
        {
            $video = Video::find($videoTitle);
            $video->categories()->sync($syncCategory);
        }
        syncCategory();
        syncCategory(2, 'romance');
        syncCategory(4, 'romance');
        syncCategory(5, 'romance');
        for ($i = 21; $i < 26; $i++) {
            syncCategory($i, 'romance');
            # code...
        }




        // // category attach video
        // function attachCategory($title = 'romance', $attach = [2, 4, 5])
        // {
        //     $video = Video::query()->where('title', $title);
        //     $video->categories()
        // }
    }
}

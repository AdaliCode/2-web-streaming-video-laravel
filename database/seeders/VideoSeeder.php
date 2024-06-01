<?php

namespace Database\Seeders;

use App\Models\Video;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $video = new Video();
        $video->title = "High School Return of a Gangster";
        $video->slug = Str::slug($video->title);
        $video->rating = 9.6;
        $video->save();

        $video = new Video();
        $video->title = "Lovely Runner";
        $video->slug = Str::slug($video->title);
        $video->save();

        $video = new Video();
        $video->title = "Bitter Sweet Hell";
        $video->slug = Str::slug($video->title);
        $video->rating = 9;
        $video->save();

        $video = new Video();
        $video->title = "Dreaming of Freaking Fairytale";
        $video->slug = Str::slug($video->title);
        $video->rating = 9.4;
        $video->save();

        $video = new Video();
        $video->title = "The Midnight Romance in Hagwon";
        $video->slug = Str::slug($video->title);
        $video->rating = 9.3;
        $video->save();

        $video = new Video();
        $video->title = "Whenever Possible";
        $video->slug = Str::slug($video->title);
        $video->rating = 8;
        $video->save();

        $video = Video::factory()->count(7)->create();
    }
}

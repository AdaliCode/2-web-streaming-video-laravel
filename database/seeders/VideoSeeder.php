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
        $video->title = "Mom's Diary";
        $video->slug = Str::slug($video->title);
        $video->save();

        $video = new Video();
        $video->title = "Lovely Runner";
        $video->slug = Str::slug($video->title);
        $video->save();

        $video = new Video();
        $video->title = "Hangout with Yoo";
        $video->slug = Str::slug($video->title);
        $video->save();

        $video = Video::factory()->count(7)->create();
    }
}

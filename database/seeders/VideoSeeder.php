<?php

namespace Database\Seeders;

use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

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
        $video->release = Carbon::create('2024/05/24');
        $video->episodeNow = ceil($video->release->diffInWeeks($now));
        $video->rating = 9;
        $video->save();

        $video = new Video();
        $video->title = "Dreaming of Freaking Fairytale";
        $video->slug = Str::slug($video->title);
        $video->release = Carbon::create('2024/05/31');
        $video->episodeNow = ceil($video->release->diffInWeeks($now));
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
        $video->category = 'variety';
        $video->release = Carbon::create('2024/04/23');
        $video->episodeNow = ceil($video->release->diffInWeeks($now));
        $video->rating = 8;
        $video->save();

        $video = Video::factory()->count(20)->state(new Sequence(
            ['category' => 'variety'],
            ['category' => 'series'],
        ))->create();
    }
}

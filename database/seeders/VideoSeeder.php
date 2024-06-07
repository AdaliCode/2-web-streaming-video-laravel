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
        function getVideoData($title = "High School Return of a Gangster", $release = '2024/05/24', $rating = 9.5)
        {
            $now = Carbon::now();

            $video = new Video();
            $video->title = $title;
            $video->slug = Str::slug($video->title);
            $video->release = Carbon::create($release);
            // jika udah tayang
            if ($video->release->diffInDays($now) >= 0) {
                // categorynya variety atau bukan
                if ($video->category == 'variety') {
                    $video->episodeNow = floor($video->release->diffInDays($now) / 7 + 1);
                } else {
                    $diffEpisode = floor($video->release->diffInDays($now) / 7 + 1); // 1 episode per 1 minggu
                    // 2 episode berturut turut per 1 minggu
                    $episodeNow = ($video->release->diffInDays($now) % 7 == 0) ? $diffEpisode * 2 - 1 : $diffEpisode * 2;
                    $video->episodeNow = $episodeNow;
                }
                $video->rating = $rating;
            }
            $video->save();
        }

        // episode 2, 24/4/24, jam indonesia
        getVideoData();
        getVideoData(title: "Lovely Runner", rating: 9.6);
        getVideoData(title: "Bitter Sweet Hell", rating: 9);
        getVideoData(title: "Dreaming of Freaking Fairytale", release: '2024/05/31', rating: 9.4);
        getVideoData(title: "The Midnight Romance in Hagwon", rating: 9.3, release: '2024/5/11');
        getVideoData(title: "The Player 2: Master of Swindlers", release: '2024/06/4');
        getVideoData(title: "Whenever Possible", release: '2024/04/23 20:20', rating: 8);
        getVideoData(title: "Abracadabra", release: '2024/06/18');

        Video::factory()->count(20)->state(new Sequence(
            ['release' =>  Carbon::create('2024/06/7')],
            ['release' =>  Carbon::create('2024/06/17')],
        ))->create();
    }
}

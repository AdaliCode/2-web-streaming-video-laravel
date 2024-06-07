<?php

namespace Database\Seeders;

use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SyncCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // video sync category
        function syncCategory($videoTitle = 7, $syncCategory = ['variety-show-korea', 'sbs'])
        {
            $video = Video::find($videoTitle);
            $video->categories()->sync($syncCategory);

            // menentukan episode
            $now = Carbon::now();
            if (Carbon::create($video->release)->diffInDays($now) >= 0) {
                if ($video->categories->contains('name', 'Variety Show Korea')) {
                    $video->update([
                        'episodeNow' => floor(Carbon::create($video->release)->diffInDays($now) / 7 + 1)
                    ]);
                } else {
                    $diffEpisode = floor(Carbon::create($video->release)->diffInDays($now) / 7 + 1); // 1 episode per 1 minggu
                    // 2 episode berturut turut per 1 minggu
                    $episodeNow = (Carbon::create($video->release)->diffInDays($now) % 7 == 0) ? $diffEpisode * 2 - 1 : $diffEpisode * 2;
                    $video->update([
                        'episodeNow' => $episodeNow
                    ]);
                }
            }
        }
        syncCategory();
        syncCategory(1, 'drama-korea');
        syncCategory(2, ['romance', 'drama-korea']);
        syncCategory(3, 'drama-korea');
        syncCategory(4, ['romance', 'drama-korea']);
        syncCategory(5, ['romance', 'drama-korea']);
        syncCategory(6, 'drama-korea');

        // for factory
        $video = Video::where('is_random', true)->get();
        foreach ($video as $value) {
            syncCategory($value->id, fake()->randomElement(['variety-show-korea', 'drama-korea', 'romance']));
        }
    }
}

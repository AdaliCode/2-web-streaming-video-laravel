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

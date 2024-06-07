<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SyncVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
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
    }
}

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
        $this->call(SyncVideoSeeder::class);
        $this->call(SyncCategorySeeder::class);
    }
}

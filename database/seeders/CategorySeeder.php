<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        function getCategoryData($name = 'Variety Show Korea')
        {
            $category = new Category();
            $category->name = ucwords($name);
            $category->id = Str::slug($category->name);
            $category->save();
            // $category->videos()->sync([1, 2, 3]);
        }
        getCategoryData();
        getCategoryData('SBS');
        getCategoryData('romance');
        getCategoryData('Drama Korea');
    }
}

<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Rubric;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::factory(30)->create()->each(function ($news) {
            $rubrics = Rubric::inRandomOrder()->limit(rand(1, 3))->pluck('id');
            $news->rubrics()->attach($rubrics);
        });
    }
}

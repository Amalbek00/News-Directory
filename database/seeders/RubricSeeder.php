<?php

namespace Database\Seeders;

use App\Models\Rubric;
use Illuminate\Database\Seeder;

class RubricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rootRubrics = Rubric::factory(5)->create();

        foreach ($rootRubrics as $rubric) {
            Rubric::factory(2)->create([
                'parent_id' => $rubric->id,
            ]);
        }

    }
}

<?php

namespace App\Repositories;

use App\Models\Rubric;

class RubricRepository
{
    public function all()
    {
        return Rubric::with('children')->whereNull('parent_id')->get();
    }

    public function create(array $data): Rubric
    {
        return Rubric::create($data);
    }
}

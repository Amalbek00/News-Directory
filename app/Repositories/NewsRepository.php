<?php

namespace App\Repositories;

use App\Models\News;

class NewsRepository
{

    public function create(array $data)
    {
        return News::create($data);
    }

    public function withRelations()
    {
        return News::with(['author', 'rubrics']);
    }

    public function query()
    {
        return News::query();
    }

}

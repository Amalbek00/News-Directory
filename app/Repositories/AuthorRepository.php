<?php

namespace App\Repositories;

use App\Models\Author;

class AuthorRepository
{
    public function all()
    {
        return Author::all();
    }

    public function create(array $data): Author
    {
        return Author::create($data);
    }
}

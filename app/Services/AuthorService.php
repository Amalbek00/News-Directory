<?php

namespace App\Services;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use App\Repositories\AuthorRepository;

class AuthorService
{
    public function __construct(protected AuthorRepository $repository)
    {
    }

    public function getAll()
    {
        return $this->repository->all();
    }

    public function create(AuthorRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        return $this->repository->create($data);
    }
}

<?php

namespace App\Services;

use App\Repositories\RubricRepository;

class RubricService
{
    protected RubricRepository $repository;
    public function __construct(RubricRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->all();
    }

    public function create(array $data)
    {
        return $this->repository->create($data);
    }
}

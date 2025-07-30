<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RubricRequest;
use App\Services\RubricService;

class RubricController extends Controller
{
    protected RubricService $service;
    public function __construct(RubricService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->getAll();
    }

    public function store(RubricRequest $request)
    {
        return $this->service->create($request->all());
    }

}

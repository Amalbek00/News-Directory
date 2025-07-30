<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\SearchNewsRequest;
use App\Models\Author;
use App\Models\Rubric;
use App\Services\NewsService;

class NewsController extends Controller
{
    protected NewsService $service;
    public function __construct(NewsService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->getAll();
    }

    public function show(int $id)
    {
        return $this->service->find($id);
    }

    public function store(NewsRequest $request)
    {
        return $this->service->create($request);
    }

    public function byAuthor(Author $author)
    {
        return $this->service->getByAuthor($author);
    }

    public function byRubric(Rubric $rubric)
    {
        return $this->service->getByRubric($rubric);
    }

    public function searchByTitle(SearchNewsRequest $request)
    {
        return $this->service->searchByTitle($request);
    }

}

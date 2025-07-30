<?php

namespace App\Services;

use App\Http\Requests\NewsRequest;
use App\Http\Requests\SearchNewsRequest;
use App\Models\Author;
use App\Models\Rubric;
use App\Repositories\NewsRepository;

class NewsService
{
    protected NewsRepository $repository;
    public function __construct(NewsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->withRelations()->paginate(10);
    }

    public function find(int $id)
    {
        return $this->repository->withRelations()->findOrFail($id);
    }

    public function create(NewsRequest $request)
    {
        $data = $request->validated();
        $rubrics = $data['rubrics'];
        unset($data['rubrics']);

        $news = $this->repository->create($data);
        $news->rubrics()->attach($rubrics);

        return response()->json($news->load('author', 'rubrics'), 201);
    }

    public function getByAuthor(Author $author)
    {
        return $author->news()->with('rubrics')->paginate(10);
    }

    public function getByRubric(Rubric $rubric)
    {
        $rubricIds = $this->getAllRubricIds($rubric);

        return $this->repository
            ->query()
            ->whereHas('rubrics', fn($q) => $q->whereIn('rubrics.id', $rubricIds))
            ->with(['author', 'rubrics'])
            ->paginate(10);
    }

    public function searchByTitle(SearchNewsRequest $request)
    {
        $query = $request->validated();

        return $this->repository
            ->query()
            ->where('title', 'like', '%' . $query['keyword'] . '%')
            ->with(['author', 'rubrics'])
            ->paginate(10);
    }

    protected function getAllRubricIds(Rubric $rubric): array
    {
        $ids = [$rubric->id];
        foreach ($rubric->children as $child) {
            $ids = array_merge($ids, $this->getAllRubricIds($child));
        }
        return $ids;
    }
}

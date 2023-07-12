<?php

namespace App\Tasks\Categories;

use App\Criteria\WhereFieldCriteria;
use App\Repositories\CategoryRepository;

class GetCategoriesTask
{
    protected CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $columns = ['*'], $limit = null)
    {
        return is_null($limit) ? $this->repository->get($columns) : $this->repository->paginate($limit, $columns);
    }

    public function withRelations(array $relations = []): self
    {
        $this->repository->with($relations);
        return $this;
    }

    public function whereField(string $field, int|string|null $value): self
    {
        $this->repository->pushCriteria(new WhereFieldCriteria($field, $value));
        return $this;
    }
}

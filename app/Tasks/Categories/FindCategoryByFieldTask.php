<?php

namespace App\Tasks\Categories;

use App\Repositories\CategoryRepository;

class FindCategoryByFieldTask
{
    protected CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(string $field, int|string $value, array $columns = ['*'])
    {
        return $this->repository
            ->findByField($field, $value, $columns)
            ->first();
    }

    public function withRelations(array $relations = []): self
    {
        $this->repository->with($relations);
        return $this;
    }
}

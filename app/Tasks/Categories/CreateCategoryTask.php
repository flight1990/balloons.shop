<?php

namespace App\Tasks\Categories;

use App\Repositories\CategoryRepository;

class CreateCategoryTask
{
    protected CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $payload)
    {
        return $this->repository->create($payload);
    }
}

<?php

namespace App\Tasks\Categories;

use App\Repositories\CategoryRepository;

class UpdateCategoryTask
{
    protected CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $payload, int $id)
    {
        return $this->repository->update($payload, $id);
    }
}

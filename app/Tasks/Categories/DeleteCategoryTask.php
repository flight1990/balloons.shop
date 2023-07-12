<?php

namespace App\Tasks\Categories;

use App\Repositories\CategoryRepository;

class DeleteCategoryTask
{
    protected CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $id): int
    {
        return $this->repository->delete($id);
    }
}

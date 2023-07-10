<?php

namespace App\Tasks;

use App\Repositories\CategoryRepository;

class GetCategoriesTask
{
    protected CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $columns = ['*'])
    {
        return $this->repository
            ->with(['children:id,name,slug,parent_id'])
            ->findWhere(['parent_id' => null], $columns);
    }
}

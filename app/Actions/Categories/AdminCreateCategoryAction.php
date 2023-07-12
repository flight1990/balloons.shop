<?php

namespace App\Actions\Categories;

use App\Tasks\Categories\CreateCategoryTask;

class AdminCreateCategoryAction
{
    public function run(array $payload)
    {
        return app(CreateCategoryTask::class)->run($payload);
    }
}

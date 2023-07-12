<?php

namespace App\Actions\Categories;

use App\Tasks\Categories\UpdateCategoryTask;

class AdminUpdateCategoryAction
{
    public function run(array $payload, int $id)
    {
        return app(UpdateCategoryTask::class)->run($payload, $id);
    }
}

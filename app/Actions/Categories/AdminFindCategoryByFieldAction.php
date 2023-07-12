<?php

namespace App\Actions\Categories;

use App\Tasks\Categories\FindCategoryByFieldTask;

class AdminFindCategoryByFieldAction
{
    public function run(string $field, int|string $value)
    {
        return app(FindCategoryByFieldTask::class)->run($field, $value);
    }
}

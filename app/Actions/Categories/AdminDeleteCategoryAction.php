<?php

namespace App\Actions\Categories;

use App\Tasks\Categories\DeleteCategoryTask;

class AdminDeleteCategoryAction
{
    public function run(int $id)
    {
        return app(DeleteCategoryTask::class)->run($id);
    }
}

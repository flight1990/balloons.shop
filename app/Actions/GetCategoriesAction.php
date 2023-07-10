<?php

namespace App\Actions;

use App\Tasks\GetCategoriesTask;

class GetCategoriesAction
{
    public function run()
    {
        $columns = [
            'id',
            'name',
            'slug',
            'parent_id'
        ];

        return app(GetCategoriesTask::class)
            ->run($columns);
    }
}

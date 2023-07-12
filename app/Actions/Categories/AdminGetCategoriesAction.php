<?php

namespace App\Actions\Categories;

use App\Tasks\Categories\GetCategoriesTask;

class AdminGetCategoriesAction
{
    public function run()
    {
        return app(GetCategoriesTask::class)
            ->withRelations(['parent:id,name'])
            ->run(['id', 'name', 'slug', 'parent_id', 'created_at', 'updated_at']);
    }
}

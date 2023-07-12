<?php

namespace App\Actions\Categories;

use App\Tasks\Categories\GetCategoriesTask;

class GetCategoriesAction
{
    public function run()
    {
        return app(GetCategoriesTask::class)
            ->withRelations(['children:id,name,slug,parent_id'])
            ->whereField('parent_id', null)
            ->run(['id', 'name', 'slug', 'parent_id']);
    }
}

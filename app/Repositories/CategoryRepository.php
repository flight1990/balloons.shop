<?php

namespace App\Repositories;

use App\Models\Category;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Traits\CacheableRepository;


class CategoryRepository extends BaseRepository implements CacheableInterface
{
    use CacheableRepository;

    public function model(): string
    {
        return Category::class;
    }
}

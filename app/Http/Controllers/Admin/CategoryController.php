<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Categories\AdminCreateCategoryAction;
use App\Actions\Categories\AdminDeleteCategoryAction;
use App\Actions\Categories\AdminGetCategoriesAction;
use App\Actions\Categories\AdminUpdateCategoryAction;
use App\Actions\Categories\AdminFindCategoryByFieldAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Catalog\Categories\CreateCategoryRequest;
use App\Http\Requests\Catalog\Categories\UpdateCategoryRequest;
use App\Http\Resources\Catalog\Categories\CategoryResource;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class CategoryController extends Controller
{
    public function index(): Response
    {
        $categories = app(AdminGetCategoriesAction::class)->run();

        return Inertia::render('Admin/Catalog/Categories/Index', [
            'categories' => CategoryResource::collection($categories)
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Catalog/Categories/Modify');
    }

    public function store(CreateCategoryRequest $request): RedirectResponse
    {
        app(AdminCreateCategoryAction::class)->run($request->validated());
        return redirect()->route('admin.categories.index');
    }

    public function edit(int $id): Response
    {
        $category = app(AdminFindCategoryByFieldAction::class)->run('id', $id);

        if (is_null($category)) abort(404);

        return Inertia::render('Admin/Catalog/Categories/Modify', [
            'category' => new CategoryResource($category)
        ]);
    }

    public function update(UpdateCategoryRequest $request, int $id): RedirectResponse
    {
        app(AdminUpdateCategoryAction::class)->run($request->validated(), $id);
        return redirect()->route('admin.categories.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        app(AdminDeleteCategoryAction::class)->run($id);
        return redirect()->route('admin.categories.index');
    }
}

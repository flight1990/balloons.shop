<?php

namespace App\Http\Controllers;

use App\Actions\GetCategoriesAction;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    public function index()
    {
        $categories = app(GetCategoriesAction::class)->run();
        return Inertia::render('Welcome');
    }
}

<?php

use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Guest\CategoryController;
use App\Http\Controllers\Guest\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('guest.')->group(function () {
    Route::controller(PageController::class)->name('pages.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(CategoryController::class)->name('catalog.')->prefix('catalog')->group(function () {
        Route::get('/', 'index')->name('index');
    });
});

Route::name('admin.')->prefix('admin')->group(function () {
    Route::controller(AdminCategoryController::class)->name('categories.')->prefix('categories')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/create', 'create')->name('create');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::patch('/{id}', 'update')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });
});

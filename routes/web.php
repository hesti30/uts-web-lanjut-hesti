<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogPageController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProjectCategoryController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProjectPageController;
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

// General
Route::get('/', [LandingPageController::class, 'landingPage']);
Route::get('/projects', [ProjectPageController::class, 'projectPage']);
Route::get('/blogs', [BlogPageController::class, 'blogPage']);
Route::get('/blogs/detail/{id}', [BlogPageController::class, 'detailBlogPage']);

// Auth
Route::get('/login', [AuthController::class, "login"])->name('login');
Route::get('/logout', [AuthController::class, "logout"])->name('logout');
Route::post('/login', [AuthController::class, "doLogin"])->name('do.login');


Route::middleware(['auth:web'])->group(function () {
    Route::get('/adminindex', [AdminController::class, 'index']);
    // Blog
    Route::get('/blog', [BlogController::class, 'index']);
    Route::get('/blog/add', [BlogController::class, 'create']);
    Route::post('/blog', [BlogController::class, 'store']);
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit']);
    Route::put('/blog/{id}', [BlogController::class, 'update']);
    Route::get('/blog/{id}/delete', [BlogController::class, 'destroy']);

    // Project Category
    Route::get('/projectcategory', [ProjectCategoryController::class, 'index']);
    Route::get('/projectcategory/add', [ProjectCategoryController::class, 'create']);
    Route::post('/projectcategory', [ProjectCategoryController::class, 'store']);
    Route::get('/projectcategory/{id}/edit', [ProjectCategoryController::class, 'edit']);
    Route::put('/projectcategory/{id}', [ProjectCategoryController::class, 'update']);
    Route::get('/projectcategory/{id}/delete', [ProjectCategoryController::class, 'destroy']);


    // Project
    Route::get('/project', [ProjectController::class, 'index']);
    Route::get('/project/add', [ProjectController::class, 'create']);
    Route::post('/project', [ProjectController::class, 'store']);
    Route::get('/project/{id}/edit', [ProjectController::class, 'edit']);
    Route::put('/project/{id}', [ProjectController::class, 'update']);
    Route::get('/project/{id}/delete', [ProjectController::class, 'destroy']);

    // Blog Category
    Route::prefix('/blogcategory')->group(function () {
        Route::get('/', [BlogCategoryController::class, 'index']);
        Route::get('/add', [BlogCategoryController::class, 'create']);
        Route::post('/', [BlogCategoryController::class, 'store']);
        Route::get('/{id}/edit', [BlogCategoryController::class, 'edit']);
        Route::put('/{id}', [BlogCategoryController::class, 'update']);
        Route::get('/{id}/delete', [BlogCategoryController::class, 'destroy']);
    });

    // Blog
    Route::prefix('/blog')->group(function () {
        Route::get('/', [BlogController::class, 'index']);
        Route::get('/add', [BlogController::class, 'create']);
        Route::post('/', [BlogController::class, 'store']);
        Route::get('/{id}/edit', [BlogController::class, 'edit']);
        Route::put('/{id}', [BlogController::class, 'update']);
        Route::get('/{id}/delete', [BlogController::class, 'destroy']);
    });
});

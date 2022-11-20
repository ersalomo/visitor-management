<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    ArticleController,
    ArticleCommentController,
};

Route::group([
    'middleware' => ['auth:api'],
    'prefix' => 'auth',
    'except' => ['login', 'register']
], function ($router) {

    Route::post('register', [UserController::class, 'register'])->name('register');
    Route::post('login', [UserController::class, 'login'])->name('login');
    Route::post('me', [UserController::class, 'me'])->name('me');
    Route::post('logout', [UserController::class, 'logout'])->name('logout');
    Route::post('refresh', [UserController::class, 'refresh'])->name('refresh');
    Route::get('index', [UserController::class, 'index'])->name('index');
    Route::get('show-user/{id}', [UserController::class, 'showUser'])->name('show.user');

    Route::controller(ArticleController::class)
        // ->prefix('articles')
        ->group(function () {
            Route::post('store', 'store')->name('store');
            Route::get('index-article', 'index')->name('index-article');
            Route::get('show-article/{article?}', 'show')->name('show-article');
            Route::put('update/{id}', 'update')->name('update-article');
            Route::delete('delete/{article}', 'destroy')->name('delete-article');
        });

    Route::controller(ArticleCommentController::class)
        ->prefix('comments')
        ->group(function () {
            Route::get('index', 'index');
            Route::post('store', 'store');
            Route::put('update/{articleComment?}', 'update');
            Route::delete('delete/{articleComment?}', 'delete');
        });
});

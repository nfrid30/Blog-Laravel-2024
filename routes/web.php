<?php

use App\Http\Controllers\Admin as Admin;
use App\Http\Controllers\Web as Web;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'posts');

Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', AdminMiddleware::class],
    'as' => 'admin.'
    ],
    function () {
        Route::get('/', [Admin\AdminController::class, 'index'])->name('index');
        Route::resource('categories', Admin\CategoryController::class)
            ->except('show');
        Route::resource('tags', Admin\TagController::class)
            ->except('show');
    });
Route::resource('posts', Web\PostController::class);
Route::resource('comments', Web\CommentController::class)->only(['store', 'update', 'destroy']);
Route::resource('subscriptions', Web\SubscriptionController::class)->only(['store', 'destroy']);
Route::resource('reactions', Web\ReactionController::class)->only(['store', 'destroy']);





require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReplyController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Route::resource('posts', PostController::class);

    // Comments (create, update, delete)
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // Replies (create, update, delete)
    Route::post('/comments/{comment}/replies', [ReplyController::class, 'store'])->name('replies.store');
    Route::put('/replies/{reply}', [ReplyController::class, 'update'])->name('replies.update');
    Route::get('/replies/{reply}/edit', [ReplyController::class, 'edit'])->name('replies.edit');
    Route::delete('/replies/{reply}', [ReplyController::class, 'destroy'])->name('replies.destroy');

});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth', 'manager'])->prefix('manager')->group(function () {
    Route::get('/dashboard', [ManagerController::class, 'index'])->name('pages.manager.index');
});

require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// トップページ（ゲストでもアクセス可）
// Route::get('/', function () {
//     return view('welcome');
// });

// 認証＋メール確認が必要なダッシュボード
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 認証済ユーザー用のルートグループ
Route::middleware(['auth'])->group(function () {
    // タスク関連（CRUD）
    Route::resource('tasks', TaskController::class);

    Route::put('/tasks/{task}/complete', [TaskController::class, 'complete'])->name('tasks.complete');

    // プロフィール編集関連
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Laravel Breeze 等の認証ルート
require __DIR__ . '/auth.php';

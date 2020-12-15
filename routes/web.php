<?php

use Illuminate\Support\Facades\Auth;
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



Route::get('/', function () {
    return view('welcome');
});


// Route::get('/folders/{id}/tasks', 'App\Http\Controllers\TaskController')->name('tasks.index');

// ホーム画面の表示
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// 一覧画面
Route::get('/folders/{id}/tasks', [App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');

// フォルダの作成
Route::get('/folders/create', [App\Http\Controllers\FolderController::class, 'showCreateForm'])->name('folders.create');
Route::post('/folders/create', [App\Http\Controllers\FolderController::class, 'create']);

// タスクの作成
Route::get('/folders/{id}/tasks/create', [App\Http\Controllers\TaskController::class, 'showCreateForm'])->name('tasks.create');
Route::post('/folders/{id}/tasks/create', [App\Http\Controllers\TaskController::class, 'create']);

// タスクの編集
Route::get('/folders/{id}/tasks/{task_id}/edit', [App\Http\Controllers\TaskController::class, 'showEditForm'])->name('tasks.edit');
Route::post('/folders/{id}/tasks/{task_id}/edit', [App\Http\Controllers\TaskController::class, 'edit']);

// 会員登録の認証
Auth::routes();




// Route::get(
//     '/folders/{folder}/tasks',
//     [App\Http\Controllers\TaskController::class, 'index']
// )->name('tasks.index');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

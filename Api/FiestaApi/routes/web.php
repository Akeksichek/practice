<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\VideoController;
use App\Models\video_test;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/fetch_video/{id_video}', [VideoController::class, 'fetch']);
Route::get('/fetchid_video/{id_video}', [VideoController::class, 'fetchid']);


Route::get('/index_u', [VideoController::class, 'index']);
Route::post('/index_v', [VideoController::class, 'insert'])->name('insert.file');


Route::get('/like_show_all', [LikeController::class, 'index']);
Route::get('/like_show', [LikeController::class, 'likes']);
Route::post('/likes', [LikeController::class, 'toggleLike']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('profile.show');
    })->name('profile.show');
    Route::get('/', function () {
        return view('head');
    })->name('head');
});


Route::get('/admin/videos', [AdminController::class, 'index'])->middleware('auth')->name('admin.videos.index');;
Route::post('/admin/videos/{id_video}/block', [AdminController::class, 'blockVideo'])->name('admin.videos.block')->middleware('auth');
Route::post('/admin/videos/{id_video}/unblock', [AdminController::class, 'unblockVideo'])->name('admin.videos.unblock')->middleware('auth');

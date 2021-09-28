<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskCompleteController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [TaskController::class, 'index']);
Route::get('/gallery', [TaskController::class, 'gallery'])->name('gallery'); 

Route::get('/tasks', function () {
    return redirect()->route('user_cards', ['id' => Auth::id()]);
})->middleware(['auth'])->name('my_tasks');
Route::get('/tasks/{id}', [TaskController::class, 'showByTask'])->name('task_cards');

Route::get('/users', [Usercontroller::class, 'index'])->name('users');
Route::get('/users/{id}', [TaskController::class, 'showByUser'])->name('user_cards');


Route::post('image-upload', [ ImageUploadController::class, 'imageUploadPost' ])->name('image.upload.post')->middleware('optimizeImages');
Route::post('image-rotate', [ ImageUploadController::class, 'imageRotate' ])->name('image.rotate.post');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

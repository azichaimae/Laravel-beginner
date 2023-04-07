<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/languageConverter/{locale}', function ($locale) {
if(in_array($locale,["ar","fr","en"]))
{
    session()->put("locale",$locale);
}
    return redirect()->back();

})->name('languageConverter');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/posts',  [PostsController::class,'index'])->name('post');
    Route::get('/posts/show/{post}',  [PostsController::class,'show'])->name('posts.show');
    Route::get('/posts/create',  [PostsController::class,'create'])->name('posts.create');
    Route::post('/posts/store',  [PostsController::class,'store'])->name('posts.store');
    Route::get('edit/{id}',[PostsController::class,'edit']);
    Route::put('update/{id}',[PostsController::class,'update']);
    Route::get('delete/{id}',[PostsController::class,'delete']);
    Route::get('/users',  [UserController::class,'User'])->name('user');
    Route::get('editUser/{id}',[UserController::class,'editUser']);
    Route::put('updateUser/{id}',[UserController::class,'updateUser']);
    // Route::get('/users', [UserController::class, 'index'])->name('users');

});

require __DIR__.'/auth.php';

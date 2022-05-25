<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
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


Route::get('/', function(){
    return view('auth.login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function(){
    Route::get('user-profile',[ProfileController::class,'userProfile'])->name('user.profile');
    Route::post('update-profile',[ProfileController::class,'userUpdate'])->name('update.profile');
    Route::get('blogs',[BlogController::class,'index'])->name('blog.index');
    Route::get('blog/create',[BlogController::class,'create'])->name('blog.create');
    Route::post('blog/store',[BlogController::class,'store'])->name('blog.store');
    Route::get('blog/{id}/edit',[BlogController::class,'edit'])->name('blog.edit');
    Route::post('blog/{id}/update',[BlogController::class,'update'])->name('blog.update');
    Route::get('blog/{id}/delete',[BlogController::class,'destroy'])->name('blog.delete');
});
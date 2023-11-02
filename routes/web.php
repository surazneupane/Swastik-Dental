<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\PublicController;
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

Route::get('/', [PublicController::class, 'index'])->name('public.index');
Route::get('/about', [PublicController::class, 'about'])->name('public.about');
Route::get('/services', [PublicController::class, 'services'])->name('public.services');
Route::get('/doctors', [PublicController::class, 'doctors'])->name('public.doctors');
Route::get('/blogs', [PublicController::class, 'blogs'])->name('public.blogs');
Route::get('/blog/{url}', [PublicController::class, 'blog'])->name('public.blog');
Route::get('/contact', [PublicController::class, 'contact'])->name('public.contact');




// Admin
Route::get('/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('submit/login', [AuthController::class, 'submitLogin'])->name('admin.login.submit');

Route::prefix('admin')->middleware('admin.auth')->group(function () {
    // auth
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    // index
    Route::get('dashboard', [IndexController::class, 'index'])->name('admin.dashboard');
    // sliders
    Route::get('sliders', [SliderController::class, 'index'])->name('admin.sliders');

});

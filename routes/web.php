<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StaffController;
use http\Client\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\SaveAppointement;
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

Route::get('/', [PublicController::class, 'show'])->name('public.index');
Route::get('/about', [PublicController::class, 'about'])->name('public.about');
Route::get('/services', [PublicController::class, 'services'])->name('public.services');
Route::get('/doctors', [PublicController::class, 'doctors'])->name('public.doctors');
Route::get('/blogs', [PublicController::class, 'blogs'])->name('public.blogs');
Route::get('/blog/{url}', [PublicController::class, 'blog'])->name('public.blog');
Route::get('/contact', [PublicController::class, 'contact'])->name('public.contact');

Route::get('/sliders/{slider}/edit',[SliderController::class,'edit']);
Route::post('/make/appointment',[PublicController::class, 'reserve']);



// Admin
Route::get('/admin/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('submit/login', [AuthController::class, 'submitLogin'])->name('admin.login.submit');

Route::prefix('admin')->middleware('admin.auth')->group(function () {

    // auth
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    // index
    Route::get('dashboard', [DashboardController::class, 'show'])->name('admin.dashboard');
    // sliders
    Route::get('sliders', [SliderController::class, 'index'])->name('admin.sliders');
    //show add slider page
    Route::get('/create-slider',[SliderController::class,'createSlider'])->name('admin.create-slider');
    //
    Route::post('/add/slider-image',[SliderController::class,'store']);
    //Edit slider
    Route::put('/edit/{slider}',[SliderController::class,'update']);
    //Appointment
    Route::get('/appointments' ,[DashboardController::class,'appointment'])->name('admin.appointments');
    //Services
    Route::get('/services',[ServiceController::class,'services'])->name('admin.services');
    //Add services
    Route::post('/add/services',[ServiceController::class,'store']);
    //Staff
    Route::get('/staffs',[StaffController::class,'show'])->name('admin.staffs');
    //Show add staff page
    Route::get('/add-staff',[StaffController::class,'addStaff']);
    //Store
    Route::post('/add/staff',[StaffController::class,'store']);

} );

//Admin appointment filter
Route::post('/appointment/filter',[DashboardController::class,'filter']);


//At staffController, have to make view and route users to the staff.blade.php

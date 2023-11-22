<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TestimonyController;
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
Route::post('/public/message', [PublicController::class,'send']);


//Route::post('/public/message', function(){
//    dd('route is hit');
//});


Route::get('/sliders/{slider}/edit',[SliderController::class,'edit']);
Route::post('/make/appointment',[PublicController::class, 'reserve']);

//Route::post('/make/appointment',function(){
//    dd('route is hit');
//});



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
    //Staff Store
    Route::post('/add/staff',[StaffController::class,'store']);
    //Staff Delete
    Route::delete('/staff/{staff}',[StaffController::class,'delete'])->middleware('auth');
    //Route to staff edit view
    Route::get('/staff/{staff}/edit',[StaffController::class,'edit'])->middleware('auth');
    //Staff edit
    Route::put('/add/{staff}',[StaffController::class,'update']);

    //Show Inbox page
    Route::get('/messages',[MessageController::class,'show'] )->name('admin.view.message');
    //View message
    Route::get('/message/{id}',[MessageController::class,'more'])->name('admin.message.show');
    //Delete Message
    Route::delete('/message/{message}',[MessageController::class,'delete'])->middleware('auth');

    //Show Testimony
    Route::get('/testimony',[TestimonyController::class,'show'])->name('admin.testimony');
    //Show Add Testimony page
    Route::get('/add-testimony',[TestimonyController::class,'addTestimony'])->name('admin.add-testimony');
    //Save
    Route::post('/add/testimony',[TestimonyController::class,'store'])->middleware('auth');
    //Delete
    Route::delete('/testimony/{testimony}',[TestimonyController::class,'delete'])->middleware('auth');

    //Show edit page
    Route::get('/testimony/{testimony}/edit',[TestimonyController::class,'edit'])->middleware('auth');;
    //Update
    Route::put('/testimony/edit/{testimony}',[TestimonyController::class,'update'])->middleware('auth');

//    Route::put('/testimony/edit/{testimony}', function(\App\Http\Requests\AddTestimonyRequest $request){
//       dd($request);
//    });
//    Route::put('/testimony/edit/{testimony}', function(){
//        dd('Route is hit');
//    });
} );

//Admin appointment filter
Route::post('/appointment/filter',[DashboardController::class,'filter']);





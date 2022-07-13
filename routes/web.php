<?php

use App\Http\Livewire\Manage\Roles;
use Illuminate\Http\Request;
use App\Http\Livewire\Manage\Users;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
//Public routes
Route::get('/', function () {
    return view('welcome');
});


//Private routes
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])
->group(function () {

    //Writer or Loggedin user routes
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    //admin routes(role middleware parameters must be separated by pipe character and single parameter must have ending pipe character)
    Route::middleware(['role:1|2'])->group(function(){
        Route::get('/dashboard/users',Users::class)->name('users');
        Route::get('/dashboard/roles',Roles::class)->name('roles');
    });

    //Editor routes
    // Route::middleware(['role:1'])->group(function(){
    //     Route::get('/dashboard/users',Users::class)->name('users');
    //     Route::get('/dashboard/roles',Roles::class)->name('roles');
    // });
});

//Login, Register & email verification routes
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

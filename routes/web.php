<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Reports\SettlementController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('auth.login');
});

Auth::routes(['verify' => true]);

/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')
    ->middleware('auth')->middleware('verified');*/

Route::resource('user', UserController::class)->names('user')->middleware('auth')
    ->middleware('verified');

Route::get('user/toggle/{user}', [UserController::class, 'toggle'])->name('user.toggle');

Route::get('report/settlement', [SettlementController::class, 'download'])->name('report.settlement');

Route::get('home/{mes?}', [CalendarController::class, 'index'])->name('home')
    ->middleware('auth')->middleware('verified');

Route::resource('event', EventController::class)->names('event')->middleware('auth')
    ->middleware('verified');

<?php

use App\Http\Controllers\oAuthRedirectController;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

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

Route::get('/redirect', [oAuthRedirectController::class, 'oAuthRedirect'])->name('redirect');
Route::get('/auth/callback', [oAuthRedirectController::class, 'oAuthRedirectCallback'])->name('oAuthCallback');

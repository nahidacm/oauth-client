<?php

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


Route::get('/redirect', function (Request $request) {
    $request->session()->put('state', $state = Str::random(40));
 
    $query = http_build_query([
        'client_id' => env('OAUTH_CLIENT_ID', '9787a23c-22a3-4746-b402-0712f1ff8c01'),
        'redirect_uri' => env('OAUTH_CALLBACK_URL', 'http://localhost:3059/auth/callback'),
        'response_type' => 'code',
        'scope' => '',
        'state' => $state,
        'prompt' => 'login', // "none", "consent", or "login"
    ]);
 
    return redirect(env('OAUTH_AUTHORIZE_URL', 'http://localhost:3056/oauth/authorize').'?'.$query);
});


Route::get('/auth/callback', function (Request $request) {
    $state = $request->session()->pull('state');
    
    // dd($state);
    // dd($request->code);
    // dd(strlen($state) > 0 && $state === $request->state);

    throw_unless(
        strlen($state) > 0 && $state === $request->state,
        InvalidArgumentException::class
    );
 
    $response = Http::asForm()->post(env('OAUTH_TOKEN_URL', 'http://localhost:3056/oauth/token'), [
        'grant_type' => 'authorization_code',
        'client_id' => env('OAUTH_CLIENT_ID', '9787a23c-22a3-4746-b402-0712f1ff8c01'),
        'client_secret' => env('OAUTH_CLIENT_SECRET', 'BwNKwOqg2cArLbf8n6xnmLZhTWJUV8rr04oSUiz2'),
        'redirect_uri' => env('OAUTH_CALLBACK_URL', 'http://localhost:3059/auth/callback'),
        'code' => $request->code,
    ]);
 
    return $response->json();
});
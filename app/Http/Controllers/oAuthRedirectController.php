<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class oAuthRedirectController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function oAuthRedirect(HttpRequest $request)
    {

        $request->session()->put('state', $state = STr::random(40));
        $query = http_build_query([
            'client_id' => env('OAUTH_CLIENT_ID', '9787a23c-22a3-4746-b402-0712f1ff8c01'),
            'redirect_uri' => env('OAUTH_CALLBACK_URL', 'http://localhost:3059/auth/callback'),
            'response_type' => 'code',
            'scope' => '',
            'state' => $state,
            'prompt' => 'login', // "none", "consent", or "login"
        ]);

        return redirect(env('OAUTH_AUTHORIZE_URL', 'http://127.0.0.1:8000/oauth/authorize') . '?' . $query);
    }

    public function oAuthRedirectCallback(HttpRequest $request)
    {
        $state = $request->session()->pull('state');
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
    }
}

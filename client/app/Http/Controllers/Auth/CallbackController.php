<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CallbackController extends Controller
{
    public function __invoke(Request $request)
    {
        $state = $request->session()->pull('state');

        throw_unless(
            strlen($state) > 0 && $state === $request->state,
            Exception::class
        );

        $token_url = 'http://server:8000/api/oauth/token';

        $response = Http::asForm()->post($token_url, [
            'grant_type' => 'authorization_code',
            'client_id' => env('CLIENT_ID'),
            'client_secret' => env("CLIENT_SECRET"),
            'redirect_uri' => env('REDIRECT_URL'),
            'code' => $request->code,
        ]);

        return $response->json();
    }
}

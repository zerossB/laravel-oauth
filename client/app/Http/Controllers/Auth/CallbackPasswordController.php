<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CallbackPasswordController extends Controller
{
    public function __invoke(Request $request)
    {
        $token_url = 'http://server:8000/api/oauth/token';

        $email = $request->email;
        $password = $request->password;

        $response = Http::asForm()->post($token_url, [
            'grant_type' => 'password',
            'client_id' => env('CLIENT_ID_PASSWORD'),
            'client_secret' => env("CLIENT_SECRET_PASSWORD"),
            'username' => $email,
            'password' => $password,
            'scope' => ''
        ]);

        return $response->json();
    }
}

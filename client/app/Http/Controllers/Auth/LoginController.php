<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        $state = Str::random(40);
        $request->session()->put('state', $state);

        $query = http_build_query([
            'client_id' => env('CLIENT_ID'),
            'redirect_uri' => env('REDIRECT_URL'),
            'response_type' => 'code',
            'scope' => '',
            'state' => $state,
        ]);

        $redirect_url = env('API_URL') . 'oauth/authorize?' . $query;

        return redirect($redirect_url);
    }
}

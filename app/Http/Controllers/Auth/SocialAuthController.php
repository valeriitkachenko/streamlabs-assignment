<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\SocialAuthService;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Response;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect(string $provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }

    public function callback(string $provider, SocialAuthService $socialAuthService)
    {
        try {
            $token = $socialAuthService->handleUserLogin(Socialite::driver($provider)->stateless()->user(), $provider);
        } catch (ClientException $exception) {
            return response()->json(['error' => 'Invalid credentials provided'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return response()->json(['token' => $token->plainTextToken], Response::HTTP_OK);
    }
}

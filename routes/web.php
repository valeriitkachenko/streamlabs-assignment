<?php

use App\Enums\SocialAuthProviders;
use App\Http\Controllers\Auth\SocialAuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/{provider}', [SocialAuthController::class, 'redirect'])
    ->where('provider',  SocialAuthProviders::allowedRoutesRegex());

Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback'])
    ->where('provider', SocialAuthProviders::allowedRoutesRegex());

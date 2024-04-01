<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Models\Sanctum\PersonalAccessToken;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/user/tokens', [Controller::class, 'getTokens']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

    /* Route::post('/auth/register', [Controller::class, 'createUser']);
    Route::post('/auth/login', [Controller::class, 'loginUser']);
    Route::post('/auth/Reset', [Controller::class, 'forgotPassword']); */

    return $request->user();
});
//token creation
Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);
 
    return ['token' => $token->plainTextToken];
});

Route::post('/auth/register', [Controller::class, 'createUser']);
Route::post('/auth/login', [Controller::class, 'loginUser']);
Route::post('/auth/Reset', [Controller::class, 'forgotPassword']);



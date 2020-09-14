<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Content-Type:application/json
// Accept:application/json
// Authorization:Bearer S6yGxcoQIABQo0WBNA2ImCcG49ffNcxGY7piYAtI
Broadcast::routes(['middleware' => ['auth:sanctum']]);

Route::group([
    'prefix' => 'v1',
    'middleware' => ['auth:sanctum']
], function(){
    Route::post('/logs/log-it', [LogApiController::class, 'store']);
});
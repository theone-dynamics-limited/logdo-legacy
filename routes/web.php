<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\DashboardController;

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
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});
Route::group([
    'middleware' => ['auth:sanctum', 'verified']
], function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::resource('apps', AppsController::class);
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;

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

Route::get('links', [LinkController::class, 'show'])->name('links.show');
Route::post('links', [LinkController::class, 'send'])->name('links.send');
Route::get('links/{hash}',[LinkController::class, 'away'])
    ->where('hash', '\w+')
    ->name('links.away');

Route::get('/', function () {
    return view('welcome');
});

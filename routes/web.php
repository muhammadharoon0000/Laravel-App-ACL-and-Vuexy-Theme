<?php

use App\Http\Controllers\UsersAuthController;
use Illuminate\Support\Facades\Route;
use OTIFSolutions\ACLMenu\Models\MenuItem;

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

Route::get('/', function () {
    return view('home');
});


Route::get('/login', [UsersAuthController::class, 'loginForm']);
Route::post('/login', [UsersAuthController::class, 'login']);

Route::get('/register', [UsersAuthController::class, 'registrationForm']);
Route::post('/register', [UsersAuthController::class, 'register']);




Route::get('/to_do', function () {
    return view('app.to_do');
});

<?php

use App\Http\Controllers\AuthController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::get('/to_do', function () {
        return view('app.to_do');
    });
});




Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registrationForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout']);


Route::get('/test', function () {
    $user = Auth::user();
    return $user->user_role;
    // dd($user->user_role->name, $user['user_role']['name']);

});

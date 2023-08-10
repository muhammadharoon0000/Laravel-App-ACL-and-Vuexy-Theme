<?php

use App\Http\Controllers\app\TeamController;
use App\Http\Controllers\AuthController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use OTIFSolutions\ACLMenu\Models\MenuItem;
use OTIFSolutions\ACLMenu\Models\UserRole;

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
    Route::get('/home', function () {
        return view('home');
    });
    Route::get('/dashboard', function () {
        return view('home');
    });
    Route::get('/to_do', function () {
        return view('app.to_do');
    });
    Route::get('/team', function () {
        return view('app.team');
    });
    Route::post('/storeUserRole', [TeamController::class, 'storeUserRole']);
    Route::get('/getUserRole', [TeamController::class, 'getUserRole']);
    Route::post('/addUser', [TeamController::class, 'addUser']);
});




Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registrationForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout']);


Route::get('/test', function () {
    // $user = Auth::user();
    // return $user->user_role;
    // dd($user->user_role->name, $user['user_role']['name']);
    // $roleNames = ['ADMIN', 'CUSTOMER'];
    // $roles = UserRole::whereIn('name', $roleNames)->pluck("id");
    // return $roles[0];
});

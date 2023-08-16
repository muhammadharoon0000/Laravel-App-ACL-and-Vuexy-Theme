<?php

use App\Http\Controllers\app\TeamController;
use App\Http\Controllers\AuthController;
use App\Models\User;
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
        return view('layouts.home');
    });
    Route::get('/dashboard', function () {
        return view('layouts.home');
    });
    Route::get('/to_do', function () {
        return view('app.to_do');
    });
    Route::get('/team', function () {
        return view('app.team');
    });
    Route::post('/store_user_role', [TeamController::class, 'storeUserRole']);
    Route::get('/get_user_role', [TeamController::class, 'getUserRole']);

    Route::get('/get_user_role_modal', [TeamController::class, 'getUserRoleModal']);

    Route::get('/add_user_modal', [TeamController::class, 'addUserModal']);
    Route::post('/store_or_update_user/{id?}', [TeamController::class, 'storeOrUpdateUser']);

    Route::get('/edit_user_modal/{id}', [TeamController::class, 'editUserModal']);

    Route::get('/get_permissions', [TeamController::class, 'getPermissions']);
    Route::post('/assign_permissions', [TeamController::class, 'assignPermissions']);

    Route::get('/get_all_users', [TeamController::class, 'getAllUsers']);

    Route::delete('/delete_user/{id}', [TeamController::class, 'deleteUser']);
    Route::delete('/delete_user_role/{id}', [TeamController::class, 'deleteUserRole']);

    Route::get('/get_all_user_roles', [TeamController::class, 'getAllUserRoles']);

    Route::get('/edit_user_role/{id}', [TeamController::class, 'editUserRole']);
    // Route::post('/edit_user/{id}', [TeamController::class, 'editUser']);
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
    // return Auth::user()->user_role->permissions()->pluck("name", "id");
    return "Test";
});

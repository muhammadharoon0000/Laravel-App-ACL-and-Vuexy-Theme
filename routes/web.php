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
        if (!Auth::user()->hasPermission('READ', 'dashboard'))
            return 'error';
        return view('layouts.home');
    })->middleware('role:dashboard');

    Route::get('/to_do', function () {
        if (!Auth::user()->hasPermission('READ', 'to_do'))
            return 'error';
        return view('app.to_do');
    })->middleware('role:to_do');

    Route::get('/team', function () {
        return view('app.team');
    })->middleware('role:team');

    Route::post('/store_user_role', [TeamController::class, 'storeUserRole'])->middleware('role:team');
    Route::get('/get_user_role', [TeamController::class, 'getUserRole'])->middleware('role:team');

    Route::get('/get_user_role_modal', [TeamController::class, 'getUserRoleModal'])->middleware('role:team');

    Route::get('/add_user_modal', [TeamController::class, 'addUserModal'])->middleware('role:team');
    Route::post('/store_or_update_user/{id?}', [TeamController::class, 'storeOrUpdateUser'])->middleware('role:team');

    Route::get('/edit_user_modal/{id}', [TeamController::class, 'editUserModal'])->middleware('role:team');

    Route::get('/get_permissions/{id}', [TeamController::class, 'getPermissions'])->middleware('role:team');
    Route::post('/assign_permissions', [TeamController::class, 'assignPermissions'])->middleware('role:team');

    Route::get('/get_all_users', [TeamController::class, 'getAllUsers'])->middleware('role:team');

    Route::delete('/delete_user/{id}', [TeamController::class, 'deleteUser'])->middleware('role:team');
    Route::delete('/delete_user_role/{id}', [TeamController::class, 'deleteUserRole'])->middleware('role:team');

    Route::get('/get_all_user_roles', [TeamController::class, 'getAllUserRoles'])->middleware('role:team');

    Route::get('/edit_user_role/{id}', [TeamController::class, 'editUserRole'])->middleware('role:team');


    Route::get('/chat', function () {
        return view('app.chat');
    })->middleware('role:chat');

    Route::get('/calender', function () {
        return view('app.calender');
    })->middleware('role:calender');
});


Route::get('/', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registrationForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout']);


Route::get('/test', function () {


    $menuItems = Auth::user()->user_role->menu_items;
    // $permissions = Auth::user()->user_role->permissions;
    $currentUserRole = Auth::user()->user_role;

    foreach ($menuItems as $menuItem) {
        echo '<b>' . $menuItem->name . '</b>' . '<br/>';
        foreach ($currentUserRole->permissions->where('menu_item_id', $menuItem->id) as $permission) {
            echo $permission;
        }
        // ->where('menu_item_id', $menuItem->id)
        // {{-- @foreach ($menuItem->user_roles->firstWhere('name', $currentUserRole->name)->permissions->where('menu_item_id', $menuItem->id) as $permissions) --}}
        // foreach ($menuItem->user_roles->firstWhere('name', $currentUserRole->name)->permissions->where('menu_item_id', $menuItem->id) as $permissions) {
        //     echo $permissions;
        // }

        // foreach ($menuItem->user_roles->firstWhere('name', $currentUserRole->name)->permissions as $role)
        // $permissions = $role->menu_item_id == $menuItem->id ? $role : null;

    }


    // ->where('id',2)->first()['permissions'];
    // $user = Auth::user();
    // return $user->user_role;
    // dd($user->user_role->name, $user['user_role']['name']);
    // $roleNames = ['ADMIN', 'CUSTOMER'];
    // $roles = UserRole::whereIn('name', $roleNames)->pluck("id");
    // return $roles[0];
    // return Auth::user()->user_role->permissions()->pluck("name", "id");
    // return Auth::user()->id;

    // return 
    // $currentPermission = "dashboard";
    // $permissions = Auth::user()->user_role->permissions()->where('name','LIKE','%'.$currentPermission)->get();
    // return $permissions;
    // foreach($menuItems as $menuItem){
    //     echo $menuItem->name . '<br/>';
    //     foreach($menuItem->permissions as $item){
    //         echo $item->name. '<br/>';
    //     }
    // }
    // return in_array("id" == 1, $array, true);
    // return $menuItems[0]->permissions;
    // $menu_items = UserRole::find(1)->menu_items();
    // $menuItems = UserRole::find(1)->menu_items;
    // return $menuItems[0]->permissions;
});

// $assignedMenuItems = UserRole::find($id)->menu_items;
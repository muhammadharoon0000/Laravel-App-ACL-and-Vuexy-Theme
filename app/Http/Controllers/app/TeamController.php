<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use OTIFSolutions\ACLMenu\Models\Team;
use OTIFSolutions\ACLMenu\Models\UserRole;

class TeamController extends Controller
{

    public function index()
    {
        $users = UserRole::where('team_id', Auth::user()->team_id)->get()->flatMap(function ($userRole) {
            return $userRole->users;
        });
        $currentUserTeam = Auth::user()->team_id;
        $userRoles = UserRole::where('team_id',  $currentUserTeam)->get();
        return view('app.team')->with(["users" => $users, "userRoles" => $userRoles]);
    }
    public function getUserRoleModal()
    {
        if (!Auth::user()->hasPermission('CREATE', 'team')) {
            return response()->json(['errors' => ['error' => ["You are not allowed"]]], 422);
        } else {
            return view('partials.add_user_role_modal')->with(['title' => "Add Role"]);
        }
    }
    public function editUserRole($id)
    {
        $user_role = UserRole::find($id);
        if ($user_role) {
            return view('partials.add_user_role_modal')->with(['user_role' => $user_role, 'title' => "Update Role"]);
        }
    }
    public function storeUserRole(Request $req)
    {
        $user_role = new UserRole;
        $user_role->name = strtoupper($req['name']);
        $user_role->team_id = Auth::user()->team_id;
        $user_role->save();
        return response()->json([
            "message" => "User Role successfully Added",
            "location" => "/team"
        ]);
    }
    public function deleteUserRole($id)
    {
        $user_role = UserRole::find($id);
        if ($user_role) {
            $user_role->delete();
        } else {
            return response()->json([
                'message' => 'User Role Not Found',
                "location" => "/team"
            ]);
        }
        return response()->json([
            'message' => 'User Role Successfully deleted',
            "location" => "/team"
        ]);
    }
    public function getUserRole()
    {
        $currentUserTeam = Auth::user()->team_id;
        $user_roles = UserRole::where('team_id',  $currentUserTeam)->pluck("name", "id");
        return view('partials.add_user_modal')->with([
            "title" => "Add User",
            "user_roles" => $user_roles
        ]);
    }
    public function editUserModal($id)
    {
        $user = User::find($id);
        $user_roles = UserRole::pluck("name", "id");
        return view('partials.add_user_modal')->with([
            "title" => "Update User",
            "user" => $user,
            "user_roles" => $user_roles
        ]);
    }
    public function storeOrUpdateUser(Request $req, $id = null)
    {
        $user = $id ? User::find($id) : new User;
        if (!$req->password) {
            unset($req['password']);
            unset($req['confirm_password']);
        }
        $req->validate([
            'name' => 'required | max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'user_role' => 'required',
            'password' => 'sometimes | min:6 | required_with:confirm_password | same:confirm_password',
            'confirm_password' => 'sometimes | min:6'
        ]);
        $user->name = $req->name;
        $user->email = $req->email;
        if ($req->password) {
            $user->password = Hash::make($req->password);
        }
        $user->user_role_id = $req->user_role;
        $user->save();
        $team = Team::updateOrCreate(['user_id' => $user->id]);
        $user->team_id = $team['id'];
        $user->save();


        return response()->json([
            "message" => "User Save Successfully",
            "location" => "/team"
        ]);
    }

    public function deleteUser(Request $req, $id)
    {

        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json([
                "message" => "User deleted successfully",
                "location" => "/team"
            ]);
        }

    }

    public function getAllUsers()
    {
        $users = User::where('user_role_id', '!=', "1")->get();
        $userRoles = UserRole::where('team_id', '!=', 'null')->get();
        return view('app.team')->with(["users" => $users, "userRoles" => $userRoles]);
    }

    public function getPermissions($id)
    {
        $currentUserRole = Auth::user()->user_role;
        $menuItems = $currentUserRole->menu_items;
        $userRole = UserRole::find($id);

        $assignedMenuItems = $userRole->menu_items;
        $assignedPermissions = $userRole->permissions;
        return view('partials.assign_permissions_modal')->with([
            'menuItems' => $menuItems,
            'currentUserRole' => $currentUserRole,
            'assignedMenuItems' => $assignedMenuItems,
            'assignedPermissions' => $assignedPermissions,
            "id" => $id,
        ]);
    }
    public function assignPermissions(Request $req)
    {
        $userRole = UserRole::find($req->id);
        $userRole->permissions()->sync($req['permissions']);
        $userRole->menu_items()->sync($req['menu_items']);
        return response()->json([
            "message" => "Permission assigned successfully",
            "location" => "/team"
        ]);

    }

    public function getAllUserRoles()
    {
        $currentUserTeam = Auth::user()->team_id;
        $user_roles = UserRole::where('team_id',  $currentUserTeam)->get();
        return response()->json(['data' => $user_roles]);
    }
}
<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use OTIFSolutions\ACLMenu\Models\Permission;
use OTIFSolutions\ACLMenu\Models\UserRole;

class TeamController extends Controller
{
    public function getUserRoleModal()
    {
        return view('partials.add_user_role_modal')->with(['title' => "Add Role"]);
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
        $user_roles = UserRole::pluck("name", "id");
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
        $validated = $req->validate([
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
        return response()->json([
            "message" => $id ? "User Updated successfully" : "User Added successfully",
            "location" => "/team"
        ]);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            "message" => "User Role deleted successfully",
            "location" => "/team"
        ]);
    }



    public function getAllUsers()
    {
        $users = User::where('user_role_id', '!=', "1")->get();
        return response()->json(['data' => $users]);
    }
    public function getPermissions()
    {
        $permissions = Auth::user()->user_role->permissions()->pluck("name", "id");
        return view('partials.assign_permissions_modal')->with('permissions', $permissions);
    }
    public function assignPermissions()
    {
    }

    public function getAllUserRoles()
    {
        $user_roles = UserRole::get();
        return response()->json(['data' => $user_roles]);
    }
}

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
    public function storeUserRole(Request $req)
    {
        $user_role = new UserRole;
        $user_role->name = strtoupper($req['name']);
        $user_role->save();
        return response()->json("Successfully Added");
    }

    public function getUserRole()
    {
        $user_roles = UserRole::pluck("name", "id");
        $returnHTML = view('partials.add_user_modal')->with('user_roles', $user_roles)->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }
    public function editUserForm($id)
    {
        $user = User::find($id)->pluck("email", "name", "user_role_id");
        $user_roles = UserRole::pluck("name", "id");
        $returnHTML = view('partials.add_user_modal')->with("user", $user)->with("user_roles", $user_roles);
        // ->render();
        // return response()->json(array('success' => true, 'html' => $returnHTML));
    }
    public function addUser(Request $req, $id = null)
    {
        $validated = $req->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'min:3|required_with:confirm_password | same:confirm_password',
            'confirm_password' => 'min:3'
        ]);

        $user = $id ? User::find($id) : new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->user_role_id = $req->selected_role;
        $user->save();
        return response()->json("User Added/updated Successfully");
    }

    public function getAllUsers()
    {
        $users = User::where('user_role_id', '!=', "1")->get();
        return response()->json(['data' => $users]);
    }
    public function getPermissions()
    {
        $permissions = Auth::user()->user_role->permissions()->pluck("name", "id");
        $returnHTML = view('partials.assign_permissions_modal')->with('permissions', $permissions)->render();
        return response()->json(array('success' => true, 'html' => $returnHTML));
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json("user deleted");
    }

    public function deleteUserRole($id)
    {
        $user_role = UserRole::find($id);
        $user_role->delete();
        return response()->json("user role deleted");
    }
    public function getAllUserRoles()
    {
        $user_roles = UserRole::get();
        return response()->json(['data' => $user_roles]);
    }
}

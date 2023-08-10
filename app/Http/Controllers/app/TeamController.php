<?php

namespace App\Http\Controllers\app;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        return response()->json(["user_roles" => $user_roles]);
    }

    public function addUser(Request $req)
    {
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->user_role_id = $req->selected_role;
        $user->save();
        return response()->json("User Added Successfully");
    }
}

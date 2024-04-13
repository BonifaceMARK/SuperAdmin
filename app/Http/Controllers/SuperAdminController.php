<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class SuperAdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('superadmin.dashboard');
    }

    public function users()
    {
        $users = User::with('roles')->where('role','!=',1)->get();
        return view('superadmin.users', compact('users'));
    }

    public function manageRole()
    {
        $users = User::where('role','!=',1)->get();
        $roles = Role::all();
        return view('superadmin.manage-role', compact(['users','roles']));
    }

    public function updateRole(Request $request)
    {
        User::where('id', $request->user_id)->update([
            'role' => $request->role_id
        ]);
        return redirect()->back();
    }

    public function edit($id)
{
    $user = User::findOrFail($id);
    return view('superadmin.manage-role', compact('user'));
}

public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('manageRole')->with('success', 'User deleted successfully');
}
public function update(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->update($request->all());
    return redirect()->route('manageRole')->with('success', 'User updated successfully');
}

}

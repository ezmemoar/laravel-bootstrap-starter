<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::admin()->get();
        return view('admin.role.role-list', compact(['roles']))->with('i', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::where('guard_name', 'admin')->get()->groupBy('group');
        return view('admin.role.role-create', compact(['permissions']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createPost(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'permissions' => 'required',
            'permissions.*' => 'required',
        ]);

        $newRole = Role::create([
            'name' => $request->name,
            'guard_name' => 'admin',
        ]);

        $newRole->syncPermissions($request->permissions);
        return redirect()->route('admin.role.list')->with('success', 'Role Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::where('guard_name', 'admin')->get()->groupBy('group');
        $rolePermissions = $role->permissions->pluck('name')->toArray();
        return view('admin.role.role-edit', compact(['permissions', 'role', 'rolePermissions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function editPatch(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|max:50',
            'permissions' => 'required',
            'permissions.*' => 'required',
        ]);

        $role->update([
            'name' => $request->name,
        ]);

        $role->syncPermissions($request->permissions);
        return redirect()->route('admin.role.list')->with('success', 'Role Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->syncPermissions();
        $role->delete();

        return redirect()->route('admin.role.list')->with('success', 'Role Deleted Successfully');
    }
}

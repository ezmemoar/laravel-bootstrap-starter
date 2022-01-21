<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use DB;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::admin()->get();
        return view('admin.permission.permission-list', compact(['permissions']))->with('i', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissionGroups = DB::table('permission_group')->get()->pluck('name', 'name');
        return view('admin.permission.permission-create', compact(['permissionGroups']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createPost(Request $request)
    {
        $validatedForm = $request->validate([
            'name' => 'required|max:50',
            'group' => 'required'
        ]);

        $validatedForm['guard_name'] = 'admin';
        Permission::create($validatedForm);

        return redirect()->route('admin.permission.list')->with('success', 'Permission Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $permissionGroups = DB::table('permission_group')->get()->pluck('name', 'name');
        return view('admin.permission.permission-edit', compact(['permission', 'permissionGroups']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function editPatch(Request $request, Permission $permission)
    {
        $validatedForm = $request->validate([
            'name' => 'required|max:50',
            'group' => 'required'
        ]);

        $permission->update($validatedForm);

        return redirect()->route('admin.permission.list')->with('success', 'Permission Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->syncRoles();
        $permission->delete();
        return redirect()->route('admin.permission.list')->with('success', 'Permission Deleted Successfully');
    }
}

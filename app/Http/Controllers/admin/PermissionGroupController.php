<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PermissionGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissionGroups = DB::table('permission_group')->where('guard_name', 'admin')->get();
        return view('admin.permission-group.permission-group-list', compact(['permissionGroups']))->with('i', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission-group.permission-group-create');
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
        ]);

        $validatedForm['guard_name'] = 'admin';
        DB::table('permission_group')->insert($validatedForm);

        return redirect()->route('admin.permission-group.list')->with('success', 'Permission Group Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissionGroup = DB::table('permission_group')->where('guard_name', 'admin')->where('id', $id)->first();
        return view('admin.permission-group.permission-group-edit', compact(['permissionGroup']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPatch(Request $request, $id)
    {
        $validatedForm = $request->validate([
            'name' => 'required|max:50',
        ]);

        DB::table('permission_group')->where('guard_name', 'admin')->where('id', $id)->update($validatedForm);
        return redirect()->route('admin.permission-group.list')->with('success', 'Permission Group Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('permission_group')->where('guard_name', 'admin')->where('id', $id)->delete();
        return redirect()->route('admin.permission-group.list')->with('success', 'Permission Group Deleted Successfully');
    }
}

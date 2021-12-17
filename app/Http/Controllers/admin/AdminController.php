<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return view('admin.admin.admin-list', compact('admins'))->with('i', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck('name', 'name');
        return view('admin.admin.admin-create', compact('roles'));
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
            'username' => 'required|max:50',
            'role' => 'required|exists:roles,name',
            'password' => 'required|confirmed|min:8',
            'status' => 'required|numeric|max:1',
        ], [
            'status.max' => 'Status seems to have encounter unexpected value, please input again'
        ]);

        unset($validatedForm["role"]);
        $validatedForm["password"] = bcrypt($validatedForm["password"]);

        $newAdmin = Admin::create($validatedForm);

        if($newAdmin){
            $newAdmin->assignRole($request->role);
            return redirect()->route('admin.admin.list')->with('success', 'Admin Created Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $roles = Role::all()->pluck('name', 'name');
        return view('admin.admin.admin-edit', compact('admin', 'roles'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Admin $admin)
    {
        $admin->syncRoles();
        $admin->delete();

        return redirect()->route('admin.admin.list')->with('success', 'Admin Deleted Successfully');
    }
}

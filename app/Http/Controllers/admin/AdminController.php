<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'status.max' => 'Status seems to have encountered unexpected value, please input again'
        ]);

        unset($validatedForm["role"]);
        $validatedForm["password"] = bcrypt($validatedForm["password"]);

        $newAdmin = Admin::create($validatedForm);

        if ($newAdmin) {
            $newAdmin->assignRole($request->role);
            return redirect()->route('admin.admin.list')->with('success', 'Admin Created Successfully');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function editPatch(Request $request, Admin $admin)
    {
        $validation = $request->is_change_password == 'no' ?
            $this->validateEditWithOldPassword($request, $admin) :
            $this->validateEditWithNewPassword($request, $admin);

        if (!$validation->status) {
            return redirect()->back()->withErrors($validation->error)->withInput($request->except('password', 'old_password', 'new_password', 'new_password_confirmation'));
        }

        $test = $admin->update($validation->validatedForm);
        return redirect()->route('admin.admin.list')->with('success', 'Admin Updated Successfully');
    }

    private function validateEditWithOldPassword(Request $request, Admin $admin)
    {
        $status = true;

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'username' => 'required|max:50',
            'role' => 'required|exists:roles,name',
            'password' => 'required|min:8',
            'status' => 'required|numeric|max:1',
        ], [
            'status.max' => 'Status seems to have encountered unexpected value, please input again'
        ]);

        $isPasswordIncorrect = !Hash::check($request->password, $admin->password);

        if ($isPasswordIncorrect) {
            $validator->getMessageBag()->add('password', "Password doesn't match with user current password");
        }

        if ($isPasswordIncorrect || $validator->fails()) {
            $status = false;
        }

        return (object)[
            "status" => $status,
            "validatedForm" => $request->only('name', 'username', 'role', 'status'),
            "error" => $validator->getMessageBag(),
        ];
    }

    private function validateEditWithNewPassword(Request $request, Admin $admin)
    {
        $status = true;

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'username' => 'required|max:50',
            'role' => 'required|exists:roles,name',
            'new_password' => 'required|min:8|confirmed',
            'status' => 'required|numeric|max:1',
        ], [
            'status.max' => 'Status seems to have encountered unexpected value, please input again'
        ]);

        $isPasswordIncorrect = !Hash::check($request->old_password, $admin->password);

        if ($isPasswordIncorrect) {
            $validator->getMessageBag()->add('old_password', "Password doesn't match with user current password");
        }

        if ($isPasswordIncorrect || $validator->fails()) {
            $status = false;
        }

        $form = $request->only('name', 'username', 'role', 'status');
        $form['password'] = bcrypt($request->new_password);

        return (object)[
            "status" => $status,
            "validatedForm" => $form,
            "error" => $validator->getMessageBag(),
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        $admin->syncRoles();
        $admin->delete();

        return redirect()->route('admin.admin.list')->with('success', 'Admin Deleted Successfully');
    }
}

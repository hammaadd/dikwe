<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;

class AssignmentController extends Controller
{
    public function all()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.assignment.all',compact('roles','permissions'));
    }
    public function add(Request $request)
    {
       $role_id = $request->role_id;
       $permission = $request->permission;
       $role = Role::find($role_id);
       foreach($permission as $per)
       {
           $role->permissions()->attach([$per]);
       }
        // if(){
            session()->flash('success', 'Permission Assigned Successfully.');
        // }else{
        //     session()->flash('error', 'Unable To Update Profile');
        // }

        return back();

    }
    public function edit(Request $request,Role $role)
    {
        $permissions = Permission::all();
        return view('admin.assignment.edit',compact('role','permissions'));
    }
    public function update(Request $request ,Role $role)
    {
        
        foreach($role->permissions as $permission)
        {
           $res =  $role->detachPermission($permission);
        }
        $permissions = $request->input('permission');
        foreach($permissions as $per)
        {
         $role->permissions()->attach([$per]);
        }
        // if($res){
            session()->flash('success', 'Permission assigned Successfully.');
        // }else{
        //     session()->flash('error', 'Unable To delete Permission');
        // }
        return redirect()->route('admin.assignment.list');

    }
    public function delete(Request $request,Role $role)
    {
        foreach($role->permissions as $permission)
        {
             $role->detachPermission($permission);
        }
        // if($res){
            session()->flash('success', 'Permission deleted Successfully.');
        // }else{
        //     session()->flash('error', 'Unable To delete Permission');
        // }
        return back();

    }
}

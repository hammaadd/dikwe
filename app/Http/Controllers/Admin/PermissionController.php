<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
class PermissionController extends Controller
{
    public function all()
    {
        $permissions = Permission::all();
        return view('admin.permission.all',compact('permissions'));
    } 
    public function add(Request $request)
    {
        $request->validate([
            'name' =>'required|unique:permissions|max:191'
        ]);
        $permission = New Permission;
        $name = str_replace(" ","-",$request->name);
        $permission->name = $name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        
        $res = $permission->save();
        if($res){
            $request->session()->flash('success', 'Permission Added Successfully!');
        }else{
            $request->session()->flash('error', 'Unable To Add Permission  Try Later!');
        }
        return back();
    }
    public function edit(Permission $permission)
    {
        return view('admin.permission.edit',compact('permission'));
    }
    public function update(Permission $permission,Request $request)
    {
        $request->validate([
            'name' =>'required|max:191'
        ]);
        $name = str_replace(" ","-",$request->name);
        $permission->name = $name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        
        $res = $permission->save();
        if($res){
            $request->session()->flash('success', 'Permission updated  Successfully!');
        }else{
            $request->session()->flash('error', 'Unable To udpate Permission Try Later!');
        }
        return back();
    }
    public function delete(Permission $permission,Request $request)
    {
        if($permission)
        {
            $res = $permission->delete();
            if($res){
                $request->session()->flash('success', 'Permission deleted  Successfully!');
            }else{
                $request->session()->flash('error', 'Unable To delete Permission Try Later!');
            }
        }
        return back();
    }
    
}

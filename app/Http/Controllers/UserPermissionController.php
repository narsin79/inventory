<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserPermissionController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function showAllRoles()
    {
    	$roles = Role::all();
    	return view('user.roles',compact('roles'));
    }

    public function showAllPermissions()
    {
    	$permissions = Permission::all();
    	return view('user.permissions',compact('permissions'));
    }

    public function createRole()
    {
    	$formAction = '/admin/role/submit';
    	return view('user.createRole',compact('formAction'));
    }

    public function editRole($id)
    {
    	$role = Role::find($id);
    	$formAction = '/admin/role/editRole';
    	return view('user.editRole',compact('formAction','role'));
    }

    public function submitRole(Request $request)
    {
    	if(isset($request->roleId)){
    		$success = false;
    		$message = "";
    		$role = Role::find($request->roleId);
    		$role->name = $request->roleName;
    		$role->guard_name = $request->guardName;
    		$role->save();
    		if($role) {
    			$success = true;
    			$message = "Sucessfully update";
    		}
    		return response()->json(['success' => $success, 'message' => $message]);
    	} else {
	    	Role::create([
	    		'name' => $request->roleName 
	    	]);
    	}
    	return redirect('admin/roles');
    }

    public function updateRole($roleId)
    {

    }

    public function createPermission()
    {

    }

}

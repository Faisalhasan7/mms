<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:role.list|role.create|role.edit|role.delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:role.list', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:role.add', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:role.edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:role.delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $permissions = Permission::latest()->get();
        return view('admin.permission.allPermissions', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.permission.add-permission');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $permission = Permission::create(['name' => $request->name,'group_name'=> $request->group_name]);
        $notification = array(
            'message' => 'Permission Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.permission')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $permission = Permission::findOrFail($id);
        return view('admin.permission.editPermission',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        Permission::whereId($id)->update(['name' => $request->name,'group_name'=> $request->group_name]);
        $notification = array(
            'message' => 'Permission Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.permission')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $permission = Permission::findOrFail($id);
        $permission->delete();
        $notification = array(
            'message' => 'Permission Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    /**
     * Display a listing of the resource.
     */
    public function role_index()
    {
        //
        $roles = Role::latest()->get();
        return view('admin.permission.roles.roleList', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function role_create()
    {
        //
        return view('admin.permission.roles.addRole');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function role_store(Request $request)
    {
        //
        Role::create(['name' => $request->name]);
        $notification = array(
            'message' => 'Role Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.role')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function role_show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function role_edit(string $id)
    {
        //
        $roles = Role::findOrFail($id);
        return view('admin.permission.roles.editRole',compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function role_update(Request $request, string $id)
    {
        //
        Role::whereId($id)->update(['name' => $request->name]);
        $notification = array(
            'message' => 'Role Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.role')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function role_destroy(string $id)
    {
        //
        $role = Role::findOrFail($id);
        $role->delete();
        $notification = array(
            'message' => 'Role Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    /**
     * Display a listing of the resource.
     */
    public function role_permission_index()
    {
        //
        $roles = Role::latest()->get();
        return view('admin.permission.roles.roles_permission_list', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function role_permission_create()
    {
        //
        $roles = Role::latest()->get();
        $permissions = Permission::latest()->get();
        $permission_groups = User::getpermissionGroups();
        return view('admin.permission.roles.roles_permission_add', compact('roles','permissions','permission_groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function role_permission_store(Request $request)
    {
        //
        $data = array();
        foreach ($request->permission as $key => $permission){
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $permission;

            DB::table('role_has_permissions')->insert($data);
        }


        $notification = array(
            'message' => 'Role Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.role_permission')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function role_permission_show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function role_permission_edit(string $id)
    {
        //
        $role = Role::findOrFail($id);
        $permissions = Permission::latest()->get();
        $permission_groups = User::getpermissionGroups();
        return view('admin.permission.roles.roles_permission_edit',compact('role','permissions','permission_groups'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function role_permission_update(Request $request, string $id)
    {
        //
        $role = Role::findOrFail($id);
        if (!empty($request->permission)) {
            $role->syncPermissions($request->permission);
        }

        $notification = array(
            'message' => 'Role Added Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.role_permission')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function role_permission_destroy(string $id)
    {
        //
        $role = Role::findOrFail($id);
        if (!is_null($role)) {
            $role->delete();
        }

        $notification = array(
            'message' => 'Role Permission Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}

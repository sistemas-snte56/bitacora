<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class AdminRolController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:admin.roles.index')->only('index');
        $this->middleware('permission:admin.roles.edit')->only('edit','update');
        $this->middleware('permission:admin.roles.create')->only('create','store');
        $this->middleware('permission:admin.roles.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::get();
        return view('admin.roles.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validation = $request->validate([
            'name' => ['required'],
            'permissions' => ['required'],
        ]);
        
        $role = new Role;
        $role->name = $request->input('name');
        $role->save();

        $permissionNames = Permission::whereIn('id', $request->input('permissions'))->pluck('name')->toArray();
        $role->syncPermissions($permissionNames);

        return redirect()->route('admin.roles.index')->with('success_create','Rol Guardado');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id',$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();


        return view('admin.roles.edit',compact('role','permissions','rolePermissions'));
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        // $role = Role::find($id);
        // $role->name = $request->input('name');
        // $role->save();
        // $role->syncPermissions($request->input('permission'));

        // return redirect()->route('admin.roles.index')->with('success_edit','Rol actualizado');



        
        $validation = $request->validate([
            'name' => ['required'],
            'permissions' => ['required'],
        ]);
        
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $permissionNames = Permission::whereIn('id', $request->input('permissions'))->pluck('name')->toArray();
        $role->syncPermissions($permissionNames);

        return redirect()->route('admin.roles.index')->with('success_edit','Rol actualizado');






    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('admin.roles.index')->with('success_destroy','Rol eliminado');

    }
}

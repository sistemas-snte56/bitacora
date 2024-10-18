<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class AdminUserdController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:admin.user.index')->only('index');
        $this->middleware('permission:admin.user.edit')->only('edit','update');
        $this->middleware('permission:admin.user.create')->only('create','store');
        $this->middleware('permission:admin.user.destroy')->only('destroy');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => ['required'],
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','same:confirm-password'],
            'role' => ['required'],
        ]);


        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        $user->assignRole($request->input('role'));

        return redirect()->route('admin.user.index')->with('success_create','Usuario guardado');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        
        return view('admin.users.edit',compact('user','roles','userRole'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,' . $id . ',id'],
            'password' => ['same:confirm-password'],
            'role' => ['required'],
        ]);

        $user = User::find($id);


        // Creamos un array para almacenar los datos a actualizar
        $updateUser = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ];

        // Validamos el password
        if (!empty($request->input('password'))) {
            $updateUser['password'] = Hash::make($request->input('password'));
        }


        // Actualizamos el usuario
        $user->update($updateUser);

        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('role'));

        return redirect()->route('admin.user.index')->with('success_update','Usuario actualizado');





/*


        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        $rolePermissions = DB::table('role_has_permissions')
                                ->where('role_has_permissions.role_id', $role->id)
                                ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                                ->all();
        return view('admin.roles.add-permissions', compact('role','permissions','rolePermissions'));





*/
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.user.index')->with('success_destroy','Usuario actualizado');
    }
}

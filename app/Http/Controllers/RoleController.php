<?php

namespace App\Http\Controllers;

use App\Tables\Roles;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use ProtoneMedia\Splade\SpladeForm;
use ProtoneMedia\Splade\Facades\Splade;
use App\Http\Requests\CreateRolesRequest;
use App\Http\Requests\UpdateRolesRequest;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Submit;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()

    {
        return view('admin.roles.index', [
            'roles' => Roles::class
        ]);
    }

    public function create()
    {

        return view('admin.roles.create', [
            'permissions' => Permission::pluck('name', 'id')->toArray()
        ]);
    }

    public function store(CreateRolesRequest $request)
    {
        $role = Role::create($request->validated());
        $role->syncPermissions($request->permissions);
        Splade::toast('Role Created')->autoDismiss(3);
        return to_route('admin.roles.index');
    }

    public function edit(Role $role)
    {


        return view('admin.roles.edit', [
            'role' => $role,
            'permissions' =>  Permission::pluck('name', 'id')->toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRolesRequest $request, Role $role)
    {
        $role->update($request->validated());
        $role->syncPermissions($request->permissions);
        Splade::toast('role Updated')->autoDismiss(3);
        return to_route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        Splade::toast('role Deleted')->autoDismiss(3);
        return back();
    }
}

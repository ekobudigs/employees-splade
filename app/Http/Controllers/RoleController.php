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
        $form = SpladeForm::make()->action(route('admin.roles.store'))
            ->fields([
                Input::make('name')->label('Name'),
                Submit::make()->label('Save')
            ])->class('space-y-4 bg-white rounded p-4');
        return view('admin.roles.create', [
            'form' => $form
        ]);
    }

    public function store(CreateRolesRequest $request)
    {
        Role::create($request->validated());
        Splade::toast('Role Created')->autoDismiss(3);
        return to_route('admin.roles.index');
    }

    public function edit(Role $role)
    {
        $form = SpladeForm::make()->action(route('admin.roles.update', $role))
            ->method('PUT')
            ->fields([
                Input::make('name')->label('Name'),
                Submit::make()->label('Save')
            ])->fill($role)->class('space-y-4 bg-white rounded p-4');

        return view('admin.roles.edit', [
            'form' => $form
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRolesRequest $request, Role $role)
    {
        $role->update($request->validated());
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

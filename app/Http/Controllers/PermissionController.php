<?php

namespace App\Http\Controllers;

use App\Tables\Permissions;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeForm;
use ProtoneMedia\Splade\Facades\Splade;
use Spatie\Permission\Models\Permission;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Submit;
use App\Http\Requests\CreatePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Spatie\Permission\Commands\CreatePermission;

class PermissionController extends Controller
{
    public function index()

    {
        return view('admin.permissions.index', [
            'permissions' => Permissions::class
        ]);
    }

    public function create()
    {
        $form = SpladeForm::make()->action(route('admin.permissions.store'))
            ->fields([
                Input::make('name')->label('Name'),
                Submit::make()->label('Save')
            ])->class('space-y-4 bg-white rounded p-4');
        return view('admin.permissions.create', [
            'form' => $form
        ]);
    }

    public function store(CreatePermissionRequest $request)
    {
        Permission::create($request->validated());
        Splade::toast('permission Created')->autoDismiss(3);
        return to_route('admin.permissions.index');
    }


    public function edit(Permission $permission)
    {
        $form = SpladeForm::make()->action(route('admin.permissions.update', $permission))
            ->method('PUT')
            ->fields([
                Input::make('name')->label('Name'),
                Submit::make()->label('Save')
            ])->fill($permission)->class('space-y-4 bg-white rounded p-4');

        return view('admin.permissions.edit', [
            'form' => $form
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->validated());
        Splade::toast('permission Updated')->autoDismiss(3);
        return to_route('admin.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        Splade::toast('permission Deleted')->autoDismiss(3);
        return back();
    }
}

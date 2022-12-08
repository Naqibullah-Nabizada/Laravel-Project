<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\Role\StoreRoleRequest;
use App\Http\Requests\Admin\User\Role\UpdatePermissionRequest;
use App\Http\Requests\Admin\User\Role\UpdateRoleRequest;
use App\Models\User\Permission;
use App\Models\User\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.user.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.user.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $permissions = $request->all();
        $role = Role::create($permissions);

        $permissions['permissions'] = $permissions['permissions'] ?? [];

        $role->permissions()->sync($permissions['permissions']);

        return redirect()->route('role.index')->with('swal-success', 'نقش جدید با موفقیت اضافه شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::FindOrFail($id);
        return view('admin.user.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        $role = Role::FindOrFail($id);
        $role->update($request->all());
        return redirect()->route('role.index')->with('swal-success', 'نقش با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::FindOrFail($id);
        $role->destroy($id);
        return redirect()->route('role.index')->with('swal-success', 'نقش با موفقیت حذف شد');
    }


    public function permissionForm(Role $role)
    {
        $permissions = Permission::all();

        return view('admin.user.role.set-permission', compact('role', 'permissions'));
    }

    public function permissionUpdate(UpdatePermissionRequest $request, Role $role)
    {
        $permissions = $request->all();
        $permissions['permissions'] = $permissions['permissions'] ?? [];
        $role->permissions()->sync($permissions['permissions']);

        return redirect()->route('role.index')->with('swal-success', 'دسترسی با موفقیت ویرایش شد');
    }
}

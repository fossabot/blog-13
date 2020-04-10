<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PermissionRequest;
use App\Models\Permission;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class PermissionController
 * @package App\Http\Controllers\Admin
 */
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $permissions =  Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PermissionRequest $request
     * @param Permission $permission
     * @return RedirectResponse
     */
    public function store(PermissionRequest $request, Permission $permission): RedirectResponse
    {
        $permission->create($request->all());
        return redirect()
            ->back()
            ->with('success', 'new Permission  was saved successfully');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param PermissionRequest $request
     * @param Permission $permission
     * @return RedirectResponse
     */
    public function update(PermissionRequest $request, Permission $permission): RedirectResponse
    {
        $permission->update($request->all());

        return redirect()
            ->back()
            ->with('success', 'Permission was update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Permission $permission
     * @throws \Exception
     * @return RedirectResponse
     */
    public function destroy(Permission $permission): RedirectResponse
    {
        $permission->delete();

        return redirect()
            ->back()
            ->with('success', 'Permission was delete successfully');
    }
}

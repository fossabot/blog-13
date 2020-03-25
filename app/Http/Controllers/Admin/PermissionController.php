<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PermissionRequest;
use App\Models\Permission;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
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
     * @return Response
     */
    public function store(PermissionRequest $request): RedirectResponse
    {
        Permission::create($request->all());
        return redirect()
            ->back()
            ->with('success', 'new Permission  was saved successfully');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param PermissionRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(PermissionRequest $request, $id): RedirectResponse
    {
        $permission = Permission::findOrFail($id);
        $permission->update($request->all());

        return redirect()
            ->back()
            ->with('success', 'Permission was update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy($id): RedirectResponse
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()
            ->back()
            ->with('success', 'Permission was delete successfully');
    }
}

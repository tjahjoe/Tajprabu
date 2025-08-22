<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\RoleServiceInterface;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleServiceInterface $roleService)
    {
        $this->roleService = $roleService;
    }

    public function getAllRoles()
    {
        $roles = $this->roleService->getAllRoles();
        return response()->json($roles);
    }

    public function getRoleById($id)
    {
        $role = $this->roleService->getRoleById($id);
        return response()->json($role);
    }

    public function createRole(RoleRequest $request)
    {
        $role = $this->roleService->createRole($request);
        return response()->json($role);
    }

    public function updateRole($id, RoleRequest $request)
    {
        $role = $this->roleService->updateRole($id, $request);
        return response()->json($role);
    }

    public function deleteRole($id)
    {
        $role = $this->roleService->deleteRole($id);
        return response()->json($role);
    }

    public function getTrashedRoles()
    {
        $roles = $this->roleService->getTrashedRoles();
        return response()->json($roles);
    }

    public function restoreRole($id)
    {
        $role = $this->roleService->restoreRole($id);
        return response()->json($role);
    }

    public function destroyRole($id)
    {
        $role = $this->roleService->destroyRole($id);
        return response()->json($role);
    }
}

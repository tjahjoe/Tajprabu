<?php

namespace App\Services\Implementations;

use App\Http\Requests\RoleRequest;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Services\Interfaces\RoleServiceInterface;

class RoleService implements RoleServiceInterface{
    protected $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }
    public function getAllRoles()
    {
        return $this->roleRepository->getAllRoles();
    }

    public function getRoleById($id)
    {
        return $this->roleRepository->getRoleById($id);
    }

    public function createRole(RoleRequest $request)
    {
        return $this->roleRepository->createRole([
            'kode' => $request->kode,
            'role' => $request->role,
        ]);
    }

    public function updateRole($id, RoleRequest $request)
    {
        return $this->roleRepository->updateRole($id, [
            'kode' => $request->kode,
            'role' => $request->role,
        ]);
    }
    public function deleteRole($id)
    {
        return $this->roleRepository->deleteRole($id);
    }

    public function getTrashedRoles()
    {
        return $this->roleRepository->getTrashedRoles();
    }

    public function restoreRole($id)
    {
        return $this->roleRepository->restoreRole($id);
    }

    public function destroyRole($id)
    {
        return $this->roleRepository->destroyRole($id);
    }
}


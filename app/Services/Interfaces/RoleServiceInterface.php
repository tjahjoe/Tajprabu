<?php

namespace App\Services\Interfaces;

use App\Http\Requests\RoleRequest;

interface RoleServiceInterface
{
    public function getAllRoles();

    public function getRoleById($id);

    public function createRole(RoleRequest $request);

    public function updateRole($id, RoleRequest $request);

    public function deleteRole($id);

    public function getTrashedRoles();

    public function restoreRole($id);

    public function destroyRole($id);
}
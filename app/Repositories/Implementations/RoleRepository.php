<?php

namespace App\Repositories\Implementations;

use App\Models\RoleModel;
use App\Repositories\Interfaces\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface
{
    public function getAllRoles()
    {
        return RoleModel::get();
    }

    public function getRoleById($id)
    {
        return RoleModel::find($id);
    }

    public function createRole($data)
    {
        return RoleModel::create($data) ? true : false;
    }

    public function updateRole($id, $data)
    {
        $role = RoleModel::findOrFail($id);
        return $role->update($data) ? true : false;
    }

    public function deleteRole($id)
    {
        $role = RoleModel::findOrFail($id);
        return $role->delete() ? true : false;
    } 

    public function getTrashedRoles()
    {
        return RoleModel::onlyTrashed()->get();
    }

    public function restoreRole($id)
    {
        $role = RoleModel::onlyTrashed()->findOrFail($id);
        return $role->restore() ? true : false;
    }

    public function destroyRole($id)
    {
        $role = RoleModel::withTrashed()->findOrFail($id);
        return $role->forceDelete() ? true : false;
    }
}   
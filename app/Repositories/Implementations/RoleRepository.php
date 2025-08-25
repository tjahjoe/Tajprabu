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
        $role->update($data);
        return $role;
    }

    public function deleteRole($id)
    {
        $role = RoleModel::findOrFail($id);
        $role->delete();
        return $role;
    } 

    public function getTrashedRoles()
    {
        return RoleModel::onlyTrashed()->get();
    }

    public function restoreRole($id)
    {
        $role = RoleModel::onlyTrashed()->findOrFail($id);
        $role->restore();
        return $role;
    }

    public function destroyRole($id)
    {
        $role = RoleModel::withTrashed()->findOrFail($id);
        $role->forceDelete();
        return $role;
    }
}   
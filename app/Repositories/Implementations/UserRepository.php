<?php

namespace App\Repositories\Implementations;

use App\Models\UserModel;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUsers()
    {
        return UserModel::get();
    }

    public function getUserById($id)
    {
        return UserModel::find($id);
    }

    public function createUser($data)
    {
        return UserModel::create($data) ? true : false;
    }

    public function updateUser($id, $data)
    {
        $user = UserModel::findOrFail($id);
        return $user->update($data) ? true : false;
    }

    public function deleteUser($id)
    {
        $user = UserModel::findOrFail($id);
        return $user->delete() ? true : false;
    } 

    public function getTrashedUsers()
    {
        return UserModel::onlyTrashed()->get();
    }

    public function restoreUser($id)
    {
        $user = UserModel::withTrashed()->findOrFail($id);
        return $user->restore() ? true : false;
    }

    public function destroyUser($id)
    {
        $user = UserModel::withTrashed()->findOrFail($id);
        return $user->forceDelete() ? true : false;
    }
}
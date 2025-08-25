<?php

namespace App\Repositories\Implementations;

use App\Models\UserModel;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUsers()
    {
        return UserModel::get();
    }

    public function getUser()
    {
        return Auth::user();
    }

    public function getUserByRole($role)
    {
        return UserModel::with('role')
            ->whereHas('role', function ($query) use ($role) {
                $query->where('role', $role);
            })
            ->get();
    }

    public function getUserById($id)
    {
        return UserModel::find($id);
    }

    public function createUser($data)
    {
        return UserModel::create($data);
    }

    public function updateUser($id, $data)
    {
        $user = UserModel::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function deleteUser($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();
        return $user;
    }

    public function getTrashedUsers()
    {
        return UserModel::onlyTrashed()->get();
    }

    public function restoreUser($id)
    {
        $user = UserModel::withTrashed()->findOrFail($id);
        $user->restore();
        return $user;
    }

    public function destroyUser($id)
    {
        $user = UserModel::withTrashed()->findOrFail($id);
        $user->forceDelete();
        return $user;
    }
}
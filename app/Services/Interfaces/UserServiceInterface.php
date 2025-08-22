<?php

namespace App\Services\Interfaces;

use App\Http\Requests\UserRequest;

interface UserServiceInterface
{
    public function getAllUsers();

    public function getUserById($id);

    public function createUser(UserRequest $request);

    public function updateUser($id, UserRequest $request);

    public function deleteUser($id);

    public function getTrashedUsers();

    public function restoreUser($id);

    public function destroyUser($id);
}
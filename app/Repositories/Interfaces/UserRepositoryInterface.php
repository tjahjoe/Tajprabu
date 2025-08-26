<?php

namespace App\Repositories\Interfaces;

interface UserRepositoryInterface
{
    public function getAllUsers();

    public function getUserByEmail($email);

    public function getUser();

    public function getUserById($id);

    public function getUserByRole($role);

    public function createUser(array $data);

    public function updateUser($id, array $data);

    public function deleteUser($id);

    public function getTrashedUsers();

    public function restoreUser($id);

    public function destroyUser($id);
}
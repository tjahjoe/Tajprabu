<?php

namespace App\Services\Implementations;

use App\Http\Requests\UserRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\LogRepositoryInterface;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;

class UserService implements UserServiceInterface
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function getAllUsers()
    {
        return $this->userRepository->getAllUsers();
    }

    public function getUserById($id)
    {
        return $this->userRepository->getUserById($id);
    }

    public function createUser(UserRequest $request)
    {
        return $this->userRepository->createUser([
            'role_id' => $request->role_id,
            'email' => $request->email,
            'password' => $request->password,
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'highest_education' => $request->highest_education
        ]);
    }

    public function updateUser($id, UserRequest $request)
    {
        $data = $request->only([
            'id_role',
            'email',
            'name',
            'address',
            'phone_number',
            'birth_date',
            'gender',
            'highest_education',
        ]);

        if ($request->filled('password')) {
            $data['password'] = $request->password;
        }

        return $this->userRepository->updateUser($id, $data);
    }
    public function deleteUser($id)
    {
        return $this->userRepository->deleteUser($id);
    }

    public function getTrashedUsers()
    {
        return $this->userRepository->getTrashedUsers();
    }

    public function restoreUser($id)
    {
        return $this->userRepository->restoreUser($id);
    }

    public function destroyUser($id)
    {
        return $this->userRepository->destroyUser($id);
    }
}


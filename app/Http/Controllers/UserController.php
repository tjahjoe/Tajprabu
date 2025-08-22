<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function getAllUsers()
    {
        $users = $this->userService->getAllUsers();
        return response()->json($users);
    }

    public function getUserById($id)
    {
        $user = $this->userService->getUserById($id);
        return response()->json($user);
    }

    public function createUser(UserRequest $request)
    {
        $user = $this->userService->createUser($request);
        return response()->json($user);
    }

    public function updateUser($id, UserRequest $request)
    {
        $user = $this->userService->updateUser($id, $request);
        return response()->json($user);
    }

    public function deleteUser($id)
    {
        $user = $this->userService->deleteUser($id);
        return response()->json($user);
    }

    public function getTrashedUsers()
    {
        $users = $this->userService->getTrashedUsers();
        return response()->json($users);
    }

    public function restoreUser($id)
    {
        $user = $this->userService->restoreUser($id);
        return response()->json($user);
    }

    public function destroyUser($id)
    {
        $user = $this->userService->destroyUser($id);
        return response()->json($user);
    }
}

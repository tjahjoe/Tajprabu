<?php

namespace App\Services\Implementations;

use App\Http\Requests\RoleRequest;

use App\Services\Implementations\NotificationService;

use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Repositories\Interfaces\LogRepositoryInterface;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\RoleServiceInterface;

class RoleService implements RoleServiceInterface
{

    protected $notificationService;
    protected $userRepository;
    protected $roleRepository;
    protected $logRepository;
    protected $notificationRepository;

    public function __construct(
        NotificationService $notificationService,
        UserRepositoryInterface $userRepository,
        RoleRepositoryInterface $roleRepository,
        LogRepositoryInterface $logRepository,
        NotificationRepositoryInterface $notificationRepository
    ) {
        $this->notificationService = $notificationService;
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
        $this->logRepository = $logRepository;
        $this->notificationRepository = $notificationRepository;
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
        $user = $this->userRepository->getUser();
        $role = $this->roleRepository->createRole([
            'kode' => $request->kode,
            'role' => $request->role,
        ]);

        if ($role) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Membuat role baru',
                'description' => $user->email . ' Membuat role baru',
            ]);
            $this->notificationService->createNotificationForRole(
                'Super Admin',
                'Membuat role baru',
                $user->email . 'Membuat role baru'
            );
        }
        return $role;
    }

    public function updateRole($id, RoleRequest $request)
    {
        $user = $this->userRepository->getUser();
        $role = $this->roleRepository->updateRole($id, [
            'kode' => $request->kode,
            'role' => $request->role,
        ]);

        if ($role) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Merbarui role',
                'description' => $user->email . ' Merbarui role',
            ]);
            $this->notificationService->createNotificationForRole(
                'Super Admin',
                'Merbarui role',
                $user->email . ' Merbarui role'
            );
        }
        return $role;
    }

    public function deleteRole($id)
    {
        $user = $this->userRepository->getUser();
        $role = $this->roleRepository->deleteRole($id);

        if ($role) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Menghapus role',
                'description' => $user->email . ' Menghapus role',
            ]);
            $this->notificationService->createNotificationForRole(
                'Super Admin',
                'Menghapus role',
                $user->email . 'Menghapus role'
            );
        }
        return $role;
    }

    public function getTrashedRoles()
    {
        return $this->roleRepository->getTrashedRoles();
    }


    public function restoreRole($id)
    {
        $user = $this->userRepository->getUser();
        $role = $this->roleRepository->restoreRole($id);
        if ($role) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Mengembalikan role',
                'description' => $user->email . ' Mengembalikan role',
            ]);
            $this->notificationService->createNotificationForRole(
                'Super Admin',
                'Mengembalikan role',
                $user->email . 'Mengembalikan role'
            );
        }
        return $role;
    }

    public function destroyRole($id)
    {
        $user = $this->userRepository->getUser();
        $role = $this->roleRepository->destroyRole($id);
        if ($role) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Menghapus permanen role',
                'description' => $user->email . ' Menghapus permanen role',
            ]);
            $this->notificationService->createNotificationForRole(
                'Super Admin',
                'Menghapus permanen role',
                $user->email . 'Menghapus permanen role'
            );
        }
        return $role;
    }
}


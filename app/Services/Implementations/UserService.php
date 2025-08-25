<?php

namespace App\Services\Implementations;

use App\Services\Implementations\NotificationService;

use App\Http\Requests\UserRequest;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\LogRepositoryInterface;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;
use Storage;

class UserService implements UserServiceInterface
{
    protected $notificationService;
    protected $userRepository;
    protected $logRepository;
    protected $notificationRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        LogRepositoryInterface $logRepository,
        NotificationRepositoryInterface $notificationRepository)
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
        $file = $request->file('image');
        $path = Storage::disk('s3')->put('profiles', $file);

        $user = $this->userRepository->createUser([
            'role_id' => $request->role_id,
            'email' => $request->email,
            'password' => $request->password,
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'birth_date' => $request->birth_date,
            'gender' => $request->gender,
            'highest_education' => $request->highest_education,
            'photo_path' => $path
        ]);

        if ($user) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Pengguna baru',
                'description' => $user->email . ' Pengguna baru',
            ]);

            $this->notificationService->createNotificationForRole(
                'Super Admin',
                'Pengguna baru',
                $user->email . ' Pengguna baru'
            );
        }

        return $user;
    }

    public function updateUser($id, UserRequest $request)
    {
        $user = $this->userRepository->getUser();

        $path = $this->userRepository->getUserById($id)->photo_path;

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

        if ($request->hasFile('image')) {

            if ($path) {
                Storage::disk('s3')->delete($path);
            }

            $file = $request->file('image');
            $newPath = Storage::disk('s3')->put('profiles', $file);

            $data['photo_path'] = $newPath;
        }

        if ($request->filled('password')) {
            $data['password'] = $request->password;
        }

        $userUpdated = $this->userRepository->updateUser($id, $data);

        if ($userUpdated) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Meperbarui pengguna',
                'description' => $user->email . ' Meperbarui pengguna',
            ]);

            $this->notificationRepository->createNotification([
                'id_user' => $userUpdated->id_user,
                'title' => 'Meperbarui pengguna',
                'description' => $user->email . ' Meperbarui pengguna',
            ]);
        }

        return $userUpdated;
    }
    public function deleteUser($id)
    {
        $user = $this->userRepository->getUser();
        $userDeleted = $this->userRepository->deleteUser($id);

        if ($userDeleted) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Menghapus pengguna',
                'description' => $user->email . ' Menghapus pengguna',
            ]);

            $this->notificationRepository->createNotification([
                'id_user' => $userDeleted->id_user,
                'title' => 'Menghapus pengguna',
                'description' => $user->email . ' Menghapus pengguna',
            ]);

            $this->notificationService->createNotificationForRole(
                'Super Admin',
                'Menghapus pengguna',
                $user->email . ' Menghapus pengguna'
            );
        }
    }

    public function getTrashedUsers()
    {
        return $this->userRepository->getTrashedUsers();
    }

    public function restoreUser($id)
    {
        $user = $this->userRepository->getUser();
        $userRestored = $this->userRepository->restoreUser($id);
        
        if ($userRestored) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Mengembalikan pengguna',
                'description' => $user->email . ' Mengembalikan pengguna',
            ]);

            $this->notificationRepository->createNotification([
                'id_user' => $userRestored->id_user,
                'title' => 'Mengembalikan pengguna',
                'description' => $user->email . ' Mengembalikan pengguna',
            ]);

            $this->notificationService->createNotificationForRole(
                'Super Admin',
                'Mengembalikan pengguna',
                $user->email . ' Mengembalikan pengguna'
            );
        }
        return $userRestored;
    }

    public function destroyUser($id)
    {
        $user = $this->userRepository->getUser();
        $userDestroyed = $this->userRepository->destroyUser($id);

        if ($userDestroyed) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Menghapus permanen pengguna',
                'description' => $user->email . ' Menghapus permanen pengguna',
            ]);

            $this->notificationService->createNotificationForRole(
                'Super Admin',
                'Menghapus permanen pengguna',
                $user->email . ' Menghapus permanen pengguna'
            );
        }
    }
}


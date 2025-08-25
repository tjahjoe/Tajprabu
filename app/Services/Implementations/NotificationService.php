<?php

namespace App\Services\Implementations;

use App\Http\Requests\DeleteNotificationRequest;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\NotificationServiceInterface;

class NotificationService implements NotificationServiceInterface
{
    protected $notificationRepository;
    protected $userRepository;

    public function __construct(
        NotificationRepositoryInterface $notificationRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->notificationRepository = $notificationRepository;
        $this->userRepository = $userRepository;
    }

    public function getAllNotificationsByUser($idUser)
    {
        return $this->notificationRepository->getAllNotificationsByUser($idUser);
    }

    public function getNotificationById($id)
    {
        return $this->notificationRepository->getNotificationById($id);
    }

    public function createNotificationForAdmin($title, $description)
    {
        $admins = $this->userRepository->getUserByRole('Admin');

        foreach ($admins as $admin) {
            $this->notificationRepository->createNotification([
                'id_user' => $admin->id_user,
                'title' => $title,
                'description' => $description,
            ]);
        }
    }

    public function deleteNotifications(DeleteNotificationRequest $request)
    {
        return $this->notificationRepository->deleteNotifications($request->ids);
    }

}


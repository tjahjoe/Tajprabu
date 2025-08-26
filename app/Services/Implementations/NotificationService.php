<?php

namespace App\Services\Implementations;

use App\Services\Interfaces\PusherServiceInterface;

use App\Http\Requests\DeleteNotificationRequest;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\NotificationServiceInterface;

class NotificationService implements NotificationServiceInterface
{
    protected $notificationRepository;
    protected $userRepository;
    protected $pusherService;

    public function __construct(
        NotificationRepositoryInterface $notificationRepository,
        UserRepositoryInterface $userRepository,
        PusherServiceInterface $pusherService
    ) {
        $this->notificationRepository = $notificationRepository;
        $this->userRepository = $userRepository;
        $this->pusherService = $pusherService;
    }

    public function getAllNotificationsByUser($idUser)
    {
        return $this->notificationRepository->getAllNotificationsByUser($idUser);
    }

    public function getNotificationById($id)
    {
        return $this->notificationRepository->getNotificationById($id);
    }

    public function createNotificationForRole($role, $title, $description)
    {
        $admins = $this->userRepository->getUserByRole($role);

        $emails = [];

        foreach ($admins as $admin) {
            $this->notificationRepository->createNotification([
                'id_user' => $admin->id_user,
                'title' => $title,
                'description' => $description,
            ]);

            $emails[] = $admin->email;
        }

        $this->pusherService->sendPusher($emails, $title, $description);
    }

    public function deleteNotifications(DeleteNotificationRequest $request)
    {
        return $this->notificationRepository->deleteNotifications($request->ids);
    }

}


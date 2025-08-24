<?php

namespace App\Services\Implementations;

use App\Http\Requests\DeleteNotificationRequest;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Services\Interfaces\NotificationServiceInterface;

class NotificationService implements NotificationServiceInterface
{
    protected $notificationRepository;

    public function __construct(NotificationRepositoryInterface $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    public function getAllNotificationsByUser($idUser)
    {
        return $this->notificationRepository->getAllNotificationsByUser($idUser);
    }

    public function getNotificationById($id)
    {
        return $this->notificationRepository->getNotificationById($id);
    }

    public function deleteNotifications(DeleteNotificationRequest $request)
    {
        return $this->notificationRepository->deleteNotifications($request->ids);
    }

}


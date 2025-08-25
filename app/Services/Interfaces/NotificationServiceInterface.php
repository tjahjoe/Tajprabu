<?php

namespace App\Services\Interfaces;

use App\Http\Requests\DeleteNotificationRequest;

interface NotificationServiceInterface
{
    public function getAllNotificationsByUser($idUser);

    public function getNotificationById($id);

    public function createNotificationForAdmin($title, $description);

    public function deleteNotifications(DeleteNotificationRequest $request);
}
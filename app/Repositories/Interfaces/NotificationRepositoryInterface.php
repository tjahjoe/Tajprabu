<?php

namespace App\Repositories\Interfaces;

interface NotificationRepositoryInterface
{
    public function getAllNotificationsByUser($idUser);

    public function getNotificationById($id);

    public function createNotification(array $data);

    public function deleteNotifications(array $ids);
}
<?php

namespace App\Repositories\Implementations;

use App\Models\NotificationModel;
use App\Repositories\Interfaces\NotificationRepositoryInterface;

class NotificationRepository implements NotificationRepositoryInterface
{
    public function getAllNotificationsByUser($idUser)
    {
        $notifications = NotificationModel::where('user_id', $idUser);
        $notifications->update(['status' => 'read']);
        return $notifications->get();
    }

    public function getNotificationById($id)
    {
        $notification = NotificationModel::findOrFail($id);
        $notification->update(['status' => 'read']);
        return NotificationModel::find($id);
    }

    public function createNotification($data)
    {
        return NotificationModel::create($data);
    }

    public function deleteNotifications($ids)
    {
        $notification = NotificationModel::whereIn('id_notification', $ids);
        return $notification->delete() ? true : false;
    }
}
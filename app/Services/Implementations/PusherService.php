<?php

namespace App\Services\Implementations;

use App\Services\Interfaces\PusherServiceInterface;
use Pusher\PushNotifications\PushNotifications;
class PusherService implements PusherServiceInterface
{

    public function sendPusher($emails, $title, $description)
    {
        $beamsClient = new PushNotifications([
            "instanceId" => config('services.pusher_beams.instance_id'),
            "secretKey" => config('services.pusher_beams.secret_key'),
        ]);

        $publishResponse = $beamsClient->publishToInterests(
            $emails,
            [
                "web" => [
                    "notification" => [
                        "title" => $title,
                        "body" => $description,
                        "deep_link" => "https://www.pusher.com",
                        "icon" => "https://www.sportsdestinations.com/sites/sportsdestinations.com/files/sports_destination_management/nodes/2015/8968/IMG.jpg",
                    ]
                ],
            ]
        );
    }

}


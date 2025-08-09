<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PusherController extends Controller
{
    public function publishToInterests()
    {
        $beamsClient = new \Pusher\PushNotifications\PushNotifications(array(
            "instanceId" => env('PUSHER_BEAMS_INSTANCE_ID'),
            "secretKey"  => env('PUSHER_BEAMS_SECRET_KEY'),
        ));

        $publishResponse = $beamsClient->publishToInterests(
            array("hello"),
            array(
                "web" => array("notification" => array(
                    "title"     => "Hello",
                    "body"      => "Hello, All!",
                    "deep_link" => "https://www.pusher.com",
                    "icon"      => "https://www.sportsdestinations.com/sites/sportsdestinations.com/files/sports_destination_management/nodes/2015/8968/IMG.jpg",
                )),
            )
        );

        return response()->json($publishResponse);
    }

    public function sendNotificationToUser()
    {
        $beamsClient = new \Pusher\PushNotifications\PushNotifications(array(
            "instanceId" => env('PUSHER_BEAMS_INSTANCE_ID'),
            "secretKey"  => env('PUSHER_BEAMS_SECRET_KEY'),
        ));

        $publishResponse = $beamsClient->publishToInterests(
            array("App.User." . Auth::user()->id),
            array(
                "web" => array("notification" => array(
                    "title"     => "Hello",
                    "body"      => "Hello, " . Auth::user()->name . "!",
                    "deep_link" => "https://www.pusher.com",
                )),
            )
        );

        return response()->json($publishResponse);
    }
}
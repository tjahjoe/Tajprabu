<?php

namespace App\Services\Interfaces;

interface PusherServiceInterface
{
    public function sendPusher(array $emails, $title, $description);
}
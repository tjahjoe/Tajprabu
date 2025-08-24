<?php

namespace App\Services\Interfaces;

use App\Http\Requests\LogRequest;
use Log;

interface LogServiceInterface
{
    public function getAllLogByUser($idUser);

    public function deleteLogs(LogRequest $request);

    public function getTrashedLogs();

    public function restoreLogs(LogRequest $request);

    public function destroyLogs(LogRequest $request);
}
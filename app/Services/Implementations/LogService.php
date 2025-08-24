<?php

namespace App\Services\Implementations;

use App\Http\Requests\LogRequest;
use App\Repositories\Interfaces\LogRepositoryInterface;
use App\Services\Interfaces\LogServiceInterface;

class LogService implements LogServiceInterface
{
    protected $logRepository;
    public function __construct(LogRepositoryInterface $logRepository)
    {
        $this->logRepository = $logRepository;
    }

    public function getAllLogByUser($idUser)
    {
        return $this->logRepository->getAllLogByUser($idUser);
    }

    public function deleteLogs(LogRequest $request)
    {
        return $this->logRepository->deleteLogs($request->ids);
    }

    public function getTrashedLogs()
    {
        return $this->logRepository->getTrashedLogs();
    }

    public function restoreLogs(LogRequest $request)
    {
        return $this->logRepository->restoreLogs($request->ids);
    }

    public function destroyLogs(LogRequest $request)
    {
        return $this->logRepository->destroyLogs($request->ids);
    }
}
<?php

namespace App\Repositories\Interfaces;

interface LogRepositoryInterface
{
    public function getAllLogByUser($idUser);

    public function createLog(array $data);

    public function deleteLogs(array $ids);

    public function getTrashedLogs();

    public function restoreLogs($id);

    public function destroyLogs($id);
}
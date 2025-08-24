<?php

namespace App\Repositories\Implementations;

use App\Models\LogModel;
use App\Repositories\Interfaces\LogRepositoryInterface;

class LogRepository implements LogRepositoryInterface
{
    public function getAllLogByUser($idUser)
    {
        return LogModel::where('user_id', $idUser)->get();
    }

    public function createLog(array $data)
    {
        return LogModel::create($data);
    }

    public function deleteLogs($idLog)
    {
        $log = LogModel::whereIn('id_log', $idLog);
        return $log->delete() ? true : false;
    }

    public function getTrashedLogs()
    {
        return LogModel::onlyTrashed()->get();
    }
    
    public function restoreLogs($ids)
    {
        $role = LogModel::onlyTrashed()->whereIn('id_log', $ids);
        return $role->restore() ? true : false;
    }

    public function destroyLogs($ids)
    {
        $role = LogModel::withTrashed()->whereIn('id_log', $ids);
        return $role->forceDelete() ? true : false;
    }
}
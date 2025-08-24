<?php

namespace App\Repositories\Implementations;

use App\Models\PosterModel;
use App\Repositories\Interfaces\PosterRepositoryInterface;

class PosterRepository implements PosterRepositoryInterface
{
    public function getAllPosters()
    {
        return PosterModel::get();
    }

    public function getPostersByActive($status)
    {
        return PosterModel::where('status', $status)->get();
    }

    public function getPosterById($id)
    {
        return PosterModel::find($id);
    }

    public function createPoster($data)
    {
        return PosterModel::create($data) ? true : false;
    }

    public function updatePoster($id, $data)
    {
        $poster = PosterModel::findOrFail($id);
        return $poster->update($data) ? true : false;
    }

    public function getPathById($id)
    {
        $poster = PosterModel::findOrFail($id);
        return $poster->path;
    }

    public function deletePoster($id)
    {
        $poster = PosterModel::findOrFail($id);
        return $poster->delete() ? true : false;
    }

    public function getTrashedPosters()
    {
        return PosterModel::onlyTrashed()->get();
    }

    public function restorePoster($id)
    {
        $poster = PosterModel::withTrashed()->findOrFail($id);
        return $poster->restore() ? true : false;
    }

    public function destroyPoster($id)
    {
        $poster = PosterModel::withTrashed()->findOrFail($id);
        return $poster->forceDelete() ? true : false;
    }
}
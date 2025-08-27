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
        $poster = PosterModel::with('user')->findOrFail($id);
        $poster->update($data);
        return $poster;
    }

    public function getPathById($id)
    {
        $poster = PosterModel::findOrFail($id);
        return $poster->path;
    }

    public function deletePoster($id)
    {
        $poster = PosterModel::with('user')->findOrFail($id);
        $poster->delete();
        return $poster;
    }

    public function getTrashedPosters()
    {
        return PosterModel::onlyTrashed()->get();
    }

    public function restorePoster($id)
    {
        $poster = PosterModel::withTrashed()->with('user')->findOrFail($id);
        $poster->restore();
        return $poster;
    }

    public function destroyPoster($id)
    {
        $poster = PosterModel::withTrashed()->with('user')->findOrFail($id);
        $poster->forceDelete();
        return $poster;
    }
}
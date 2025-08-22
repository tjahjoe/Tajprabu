<?php

namespace App\Repositories\Implementations;

use App\Models\TagModel;
use App\Repositories\Interfaces\TagRepositoryInterface;

class TagRepository implements TagRepositoryInterface
{
    public function getAllTags()
    {
        return TagModel::get();
    }

    public function getTagByKode($kode)
    {
        return TagModel::firstWhere('kode', $kode);
    }

    public function createTag($data)
    {
        return TagModel::create($data) ? true : false;
    }

    public function updateTag($id, $data)
    {
        $tag = TagModel::findOrFail($id);
        return $tag->update($data) ? true : false;
    }

    public function deleteTag($id)
    {
        $tag = TagModel::findOrFail($id);
        return $tag->delete() ? true : false;
    } 

    public function getTrashedTags()
    {
        return TagModel::onlyTrashed()->get();
    }

    public function restoreTag($id)
    {
        $tag = TagModel::withTrashed()->findOrFail($id);
        return $tag->restore() ? true : false;
    }

    public function destroyTag($id)
    {
        $tag = TagModel::withTrashed()->findOrFail($id);
        return $tag->forceDelete() ? true : false;
    }
}
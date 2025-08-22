<?php

namespace App\Repositories\Implementations;

use App\Models\TopicModel;
use App\Repositories\Interfaces\TopicRepositoryInterface;

class TopicRepository implements TopicRepositoryInterface
{
    public function getAllTopics()
    {
        return TopicModel::get();
    }

    public function getTopicByKode($kode)
    {
        return TopicModel::firstWhere('kode', $kode);
    }

    public function createTopic($data)
    {
        return TopicModel::create($data) ? true : false;
    }

    public function updateTopic($id, $data)
    {
        $topic = TopicModel::findOrFail($id);
        return $topic->update($data) ? true : false;
    }

    public function deleteTopic($id)
    {
        $topic = TopicModel::findOrFail($id);
        return $topic->delete() ? true : false;
    } 

    public function getTrashedTopics()
    {
        return TopicModel::onlyTrashed()->get();
    }

    public function restoreTopic($id)
    {
        $topic = TopicModel::onlyTrashed()->findOrFail($id);
        return $topic->restore() ? true : false;
    }

    public function destroyTopic($id)
    {
        $topic = TopicModel::withTrashed()->findOrFail($id);
        return $topic->forceDelete() ? true : false;
    }
}
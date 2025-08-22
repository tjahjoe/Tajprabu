<?php

namespace App\Services\Interfaces;

use App\Http\Requests\TopicRequest;

interface TopicServiceInterface
{
    public function getAllTopics();

    public function getTopicByKode($kode);

    public function createTopic(TopicRequest $request);

    public function updateTopic($id, TopicRequest $request);

    public function deleteTopic($id);

    public function getTrashedTopics();

    public function restoreTopic($id);

    public function destroyTopic($id);
}
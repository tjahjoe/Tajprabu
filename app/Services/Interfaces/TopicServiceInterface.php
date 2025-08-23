<?php

namespace App\Services\Interfaces;

use App\Http\Requests\TopicRequest;

interface TopicServiceInterface
{
    public function getAllTopics();

    public function getTrendingTopics();

    public function getTrendingTopicsByArticle($kodeArticle);

    public function getTopicByKode($kodeTopic);

    public function getAticlesByTopic($kodeTopic);

    public function createTopic(TopicRequest $request);

    public function updateTopic($id, TopicRequest $request);

    public function deleteTopic($id);

    public function getTrashedTopics();

    public function restoreTopic($id);

    public function destroyTopic($id);
}
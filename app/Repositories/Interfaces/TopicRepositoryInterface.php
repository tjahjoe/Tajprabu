<?php

namespace App\Repositories\Interfaces;

interface TopicRepositoryInterface
{
    public function getAllTopics();

    public function getTrendingTopics();

    public function getTrendingTopicsByArticle($kodeArticle);

    public function getTopicByKode($kodeTopic);

    public function getAticlesByTopic($kodeTopic);

    public function createTopic(array $data);

    public function updateTopic($id, array $data);

    public function deleteTopic($id);

    public function getTrashedTopics();

    public function restoreTopic($id);

    public function destroyTopic($id);
}
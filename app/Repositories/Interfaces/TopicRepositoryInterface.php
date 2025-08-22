<?php

namespace App\Repositories\Interfaces;

interface TopicRepositoryInterface
{
    public function getAllTopics();

    public function getTopicByKode($kode);

    public function createTopic(array $data);

    public function updateTopic($id, array $data);

    public function deleteTopic($id);

    public function getTrashedTopics();

    public function restoreTopic($id);

    public function destroyTopic($id);
}
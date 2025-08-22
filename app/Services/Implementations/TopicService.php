<?php

namespace App\Services\Implementations;

use App\Http\Requests\TopicRequest;
use App\Repositories\Interfaces\TopicRepositoryInterface;
use App\Services\Interfaces\TopicServiceInterface;
use Str;

class TopicService implements TopicServiceInterface{
    protected $topicRepository;

    public function __construct(TopicRepositoryInterface $topicRepository)
    {
        $this->topicRepository = $topicRepository;
    }
    public function getAllTopics()
    {
        return $this->topicRepository->getAllTopics();
    }

    public function getTopicByKode($kode)
    {
        return $this->topicRepository->getTopicByKode($kode);
    }

    public function createTopic(TopicRequest $request)
    {
        $kode = Str::slug($request->topic, '-');
        return $this->topicRepository->createTopic([
            'kode' => $kode,
            'topic' => $request->topic,
        ]);
    }

    public function updateTopic($id, TopicRequest $request)
    {
        $kode = Str::slug($request->topic, '-');
        return $this->topicRepository->updateTopic($id, [
            'kode' => $kode,
            'topic' => $request->topic,
        ]);
    }
    
    public function deleteTopic($id)
    {
        return $this->topicRepository->deleteTopic($id);
    }

    public function getTrashedTopics()
    {
        return $this->topicRepository->getTrashedTopics();
    }

    public function restoreTopic($id)
    {
        return $this->topicRepository->restoreTopic($id);
    }

    public function destroyTopic($id)
    {
        return $this->topicRepository->destroyTopic($id);
    }
}


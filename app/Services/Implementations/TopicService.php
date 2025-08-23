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

    public function getTrendingTopicsByArticle($kodeArticle)
    {
        return $this->topicRepository->getTrendingTopicsByArticle($kodeArticle);
    }

    public function getTrendingTopics()
    {
        return $this->topicRepository->getTrendingTopics();
    }

    public function getTopicByKode($kodeTopic)
    {
        return $this->topicRepository->getTopicByKode($kodeTopic);
    }

    public function getAticlesByTopic($kodeTopic)
    {
        return $this->topicRepository->getAticlesByTopic($kodeTopic);
    }

    public function createTopic(TopicRequest $request)
    {
        $kodeTopic = Str::slug($request->topic, '-');
        return $this->topicRepository->createTopic([
            'kode_topic' => $kodeTopic,
            'topic' => $request->topic,
        ]);
    }

    public function updateTopic($id, TopicRequest $request)
    {
        $kodeTopic = Str::slug($request->topic, '-');
        return $this->topicRepository->updateTopic($id, [
            'kode_topic' => $kodeTopic,
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


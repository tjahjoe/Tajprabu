<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\TopicServiceInterface;
use App\Http\Requests\TopicRequest;

class TopicController extends Controller
{
    protected $topicService;

    public function __construct(TopicServiceInterface $topicService)
    {
        $this->topicService = $topicService;
    }

    public function getAllTopics()
    {
        $topics = $this->topicService->getAllTopics();
        return response()->json($topics);
    }

    public function getTopicById($kode)
    {
        $topic = $this->topicService->getTopicByKode($kode);
        return response()->json($topic);
    }

    public function createTopic(TopicRequest $request)
    {
        $topic = $this->topicService->createTopic(request: $request);
        return response()->json($topic);
    }

    public function updateTopic($kode, TopicRequest $request)
    {
        $topic = $this->topicService->updateTopic($kode, $request);
        return response()->json($topic);
    }

    public function deleteTopic($kode)
    {
        $topic = $this->topicService->deleteTopic($kode);
        return response()->json($topic);
    }

    public function getTrashedTopics()
    {
        $topics = $this->topicService->getTrashedTopics();
        return response()->json($topics);
    }

    public function restoreTopic($kode)
    {
        $topic = $this->topicService->restoreTopic($kode);
        return response()->json($topic);
    }

    public function destroyTopic($kode)
    {
        $topic = $this->topicService->destroyTopic($kode);
        return response()->json($topic);
    }
}

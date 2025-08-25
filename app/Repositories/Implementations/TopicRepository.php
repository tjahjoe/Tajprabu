<?php

namespace App\Repositories\Implementations;

use App\Models\ArticleModel;
use App\Models\TopicModel;
use App\Repositories\Interfaces\TopicRepositoryInterface;

class TopicRepository implements TopicRepositoryInterface
{
    public function getAllTopics()
    {
        return TopicModel::get();
    }

    public function getTrendingTopics()
    {
        $articles = TopicModel::with('article')
            ->withSum('article', 'view')
            ->orderByDesc('article_sum_view')
            ->limit(5)
            ->get();

        return $articles;
    }

    public function getTrendingTopicsByArticle($kodeArticle)
    {
        $topics = TopicModel::with([
            'article' => function ($q) {
                $q->orderByDesc('view');
            }
        ])
            ->whereIn('id_topic', ArticleModel::where('kode_article', $kodeArticle)->pluck('id_topic'))
            ->get();

        return $topics;

    }

    public function getTopicByKode($kodeTopic)
    {
        return TopicModel::firstWhere('kode_topic', $kodeTopic);
    }

    public function getAticlesByTopic($kodeTopic)
    {
        return TopicModel::with('article')->where('kode_topic', $kodeTopic)->first();
    }

    public function createTopic($data)
    {
        return TopicModel::create($data) ? true : false;
    }

    public function updateTopic($id, $data)
    {
        $topic = TopicModel::findOrFail($id);
        $topic->update($data);
        return $topic;
    }

    public function deleteTopic($id)
    {
        $topic = TopicModel::findOrFail($id);
        $topic->delete();
        return $topic;
    }

    public function getTrashedTopics()
    {
        return TopicModel::onlyTrashed()->get();
    }

    public function restoreTopic($id)
    {
        $topic = TopicModel::onlyTrashed()->findOrFail($id);
        $topic->restore();
        return $topic;
    }

    public function destroyTopic($id)
    {
        $topic = TopicModel::withTrashed()->findOrFail($id);
        $topic->forceDelete();
        return $topic;
    }
}
<?php

namespace App\Repositories\Implementations;

use App\Models\ArticleModel;
use App\Models\TagModel;
use App\Models\TopicModel;
use App\Repositories\Interfaces\ArticleRepositoryInterface;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function getAllArticles()
    {
        return ArticleModel::all();
    }

    public function getArticleByKode($kodeArticle)
    {
        $article = ArticleModel::where('kode_article', $kodeArticle)->first();
        $article->increment('view');
        return $article;
    }

    public function getTrendingArticles()
    {
        return ArticleModel::orderBy('view', 'desc')->limit(5)->get();
    }

    public function getTrendingArticlesByTag($kodeTag)
    {
        $tag = TagModel::with([
            'article' => function ($q) {
                $q->orderByDesc('view')->limit(5);
            }
        ])
            ->where('kode_tag', $kodeTag)
            ->get();

        return $tag;
    }

    public function getTrendingArticlesByTopic($kodeTopic)
    {
        $topics = TopicModel::with([
            'article' => function ($q) {
                $q->orderByDesc('view')->limit(5);
            }
        ])
            ->where('kode_topic', $kodeTopic)
            ->get();

        return $topics;
    }

    public function createArticle(array $data)
    {
        return ArticleModel::create($data) ? true : false;
    }

    public function updateArticle($id, array $data)
    {
        $article = ArticleModel::findOrFail($id);
        return $article->update($data) ? true : false;
    }

    public function deleteArticle($id)
    {
        $article = ArticleModel::findOrFail($id);
        return $article->delete() ? true : false;
    }

    public function getTrashedArticles()
    {
        return ArticleModel::onlyTrashed()->get();
    }

    public function restoreArticle($id)
    {
        $article = ArticleModel::withTrashed()->findOrFail($id);
        return $article->restore() ? true : false;
    }

    public function destroyArticle($id)
    {
        $article = ArticleModel::withTrashed()->findOrFail($id);
        return $article->forceDelete() ? true : false;
    }
}

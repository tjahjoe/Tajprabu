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

    public function getArticleById($id)
    {
        return ArticleModel::with('user')->find($id);
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
        $article = ArticleModel::with('user')->findOrFail($id);
        $article->update($data);
        return $article;
    }

    public function deleteArticle($id)
    {
        $article = ArticleModel::with('user')->findOrFail($id);
        $article->delete();
        return $article;
    }

    public function getTrashedArticles()
    {
        return ArticleModel::onlyTrashed()->get();
    }

    public function restoreArticle($id)
    {
        $article = ArticleModel::withTrashed()->with('user')->findOrFail($id);
        $article->restore();
        return $article;
    }

    public function destroyArticle($id)
    {
        $article = ArticleModel::withTrashed()->with('user')->findOrFail($id);
        $article->forceDelete();
        return $article;
    }
}

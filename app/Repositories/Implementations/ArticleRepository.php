<?php

namespace App\Repositories\Implementations;

use App\Models\ArticleModel;
use App\Repositories\Interfaces\ArticleRepositoryInterface;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function getAllArticles()
    {
        return ArticleModel::all();
    }

    public function getArticleByKode($kode)
    {
        $article = ArticleModel::where('kode', $kode)->first();
        $article->increment('view');
        return $article;
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

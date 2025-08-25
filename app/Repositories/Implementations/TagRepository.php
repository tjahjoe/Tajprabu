<?php

namespace App\Repositories\Implementations;

use App\Models\ArticleModel;
use App\Models\TagModel;
use App\Repositories\Interfaces\TagRepositoryInterface;

class TagRepository implements TagRepositoryInterface
{
    public function getAllTags()
    {
        return TagModel::get();
    }

    public function getTrendingTags()
    {
        $articles = TagModel::with('article')
            ->withSum('article', 'view')
            ->orderByDesc('article_sum_view')
            ->limit(5)
            ->get();

        return $articles;
    }

    public function getTrendingTagsByArticle($kodeArticle)
    {
        $tags = TagModel::with([
            'article' => function ($q) {
                $q->orderByDesc('view');
            }
        ])
            ->whereHas('article', function ($q) use ($kodeArticle) {
                $q->where('kode_article', $kodeArticle);
            })
            ->get();

        return $tags;
    }

    public function getTagByKode($kodeTag)
    {
        return TagModel::firstWhere('kode_tag', $kodeTag);
    }

    public function getArticlesByTag($kodeTag)
    {
        return TagModel::with('article')->where('kode_tag', $kodeTag)->get();
    }

    public function createTag($data)
    {
        return TagModel::create($data) ? true : false;
    }

    public function updateTag($id, $data)
    {
        $tag = TagModel::findOrFail($id);
        $tag->update($data);
        return $tag;
    }

    public function deleteTag($id)
    {
        $tag = TagModel::findOrFail($id);
        $tag->delete();
        return $tag;
    }

    public function getTrashedTags()
    {
        return TagModel::onlyTrashed()->get();
    }

    public function restoreTag($id)
    {
        $tag = TagModel::withTrashed()->findOrFail($id);
        $tag->restore();
        return $tag;
    }

    public function destroyTag($id)
    {
        $tag = TagModel::withTrashed()->findOrFail($id);
        $tag->forceDelete();
        return $tag;
    }
}
<?php

namespace App\Services\Interfaces;

use App\Http\Requests\TagRequest;

interface TagServiceInterface
{
    public function getAllTags();

    public function getTrendingTags();

    public function getTrendingTagsByArticle($kodeArticle);

    public function getTagByKode($kodeTag);

    public function getArticlesByTag($kodeTag);

    public function createTag(TagRequest $request);

    public function updateTag($id, TagRequest $request);

    public function deleteTag($id);

    public function getTrashedTags();

    public function restoreTag($id);

    public function destroyTag($id);
}
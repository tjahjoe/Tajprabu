<?php

namespace App\Services\Implementations;

use App\Http\Requests\TagRequest;
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Repositories\Interfaces\LogRepositoryInterface;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Services\Interfaces\TagServiceInterface;
use Str;

class TagService implements TagServiceInterface{
    protected $tagRepository;

    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }
    public function getAllTags()
    {
        return $this->tagRepository->getAllTags();
    }

    public function getTrendingTags()
    {
        return $this->tagRepository->getTrendingTags();
    }

    public function getTrendingTagsByArticle($kodeArticle)
    {
        return $this->tagRepository->getTrendingTagsByArticle($kodeArticle);
    }

    public function getTagByKode($kodeTag)
    {
        return $this->tagRepository->getTagByKode($kodeTag);
    }

    public function getArticlesByTag($kodeTag)
    {
        return $this->tagRepository->getArticlesByTag($kodeTag);
    }

    public function createTag(TagRequest $request)
    {
        $kodeTag = Str::slug($request->tag, '-');
        return $this->tagRepository->createTag([
            'kode_tag' => $kodeTag,
            'tag' => $request->tag,
        ]);
    }

    public function updateTag($id, TagRequest $request)
    {
        $kodeTag = Str::slug($request->tag, '-');
        return $this->tagRepository->updateTag($id, [
            'kode_tag' => $kodeTag,
            'tag' => $request->tag,
        ]);
    }

    public function deleteTag($id)
    {
        return $this->tagRepository->deleteTag($id);
    }

    public function getTrashedTags()
    {
        return $this->tagRepository->getTrashedTags();
    }

    public function restoreTag($id)
    {
        return $this->tagRepository->restoreTag($id);
    }

    public function destroyTag($id)
    {
        return $this->tagRepository->destroyTag($id);
    }
}


<?php

namespace App\Services\Implementations;

use App\Http\Requests\TagRequest;
use App\Repositories\Interfaces\TagRepositoryInterface;
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

    public function getTagByKode($kode)
    {
        return $this->tagRepository->getTagByKode($kode);
    }

    public function createTag(TagRequest $request)
    {
        $kode = Str::slug($request->tag, '-');
        return $this->tagRepository->createTag([
            'kode' => $kode,
            'tag' => $request->tag,
        ]);
    }

    public function updateTag($id, TagRequest $request)
    {
        $kode = Str::slug($request->tag, '-');
        return $this->tagRepository->updateTag($id, [
            'kode' => $kode,
            'tag' => $request->tag,
        ]);
    }

    public function deleteTag($kode)
    {
        return $this->tagRepository->deleteTag($kode);
    }

    public function getTrashedTags()
    {
        return $this->tagRepository->getTrashedTags();
    }

    public function restoreTag($kode)
    {
        return $this->tagRepository->restoreTag($kode);
    }

    public function destroyTag($kode)
    {
        return $this->tagRepository->destroyTag($kode);
    }
}


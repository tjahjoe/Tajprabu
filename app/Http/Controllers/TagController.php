<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\TagServiceInterface;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    protected $tagService;

    public function __construct(TagServiceInterface $tagService)
    {
        $this->tagService = $tagService;
    }

    public function getAllTags()
    {
        $tags = $this->tagService->getAllTags();
        return response()->json($tags);
    }

    public function getTagById($kode)
    {
        $tag = $this->tagService->getTagByKode($kode);
        return response()->json($tag);
    }

    public function createTag(TagRequest $request)
    {
        $tag = $this->tagService->createTag($request);
        return response()->json($tag);
    }

    public function updateTag($id, TagRequest $request)
    {
        $tag = $this->tagService->updateTag($id, $request);
        return response()->json($tag);
    }

    public function deleteTag($id)
    {
        $tag = $this->tagService->deleteTag($id);
        return response()->json($tag);
    }

    public function getTrashedTags()
    {
        $tags = $this->tagService->getTrashedTags();
        return response()->json($tags);
    }

    public function restoreTag($id)
    {
        $tag = $this->tagService->restoreTag($id);
        return response()->json($tag);
    }

    public function destroyTag($id)
    {
        $tag = $this->tagService->destroyTag($id);
        return response()->json($tag);
    }
}

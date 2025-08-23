<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\LikeServiceInterface;
use App\Http\Requests\LikeRequest;

class LikeController extends Controller
{
    protected $likeService;

    public function __construct(LikeServiceInterface $likeService)
    {
        $this->likeService = $likeService;
    }

    // public function getAllLikes()
    // {
    //     $likes = $this->likeService->getAllLikes();
    //     return response()->json($likes);
    // }

    public function getLikeByUser($id_user)
    {
        $like = $this->likeService->getLikeByUser($id_user);
        return response()->json($like);
    }

    public function getLikeById($id_article)
    {
        $like = $this->likeService->getLikeByArticle($id_article);
        return response()->json($like);
    }

    public function createLike(LikeRequest $request)
    {
        $like = $this->likeService->createLike($request);
        return response()->json($like);
    }

    public function deleteLike($id)
    {
        $like = $this->likeService->deleteLike($id);
        return response()->json($like);
    }
    
}

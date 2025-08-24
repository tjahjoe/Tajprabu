<?php

namespace App\Services\Implementations;

use App\Http\Requests\LikeRequest;
use App\Repositories\Interfaces\LikeRepositoryInterface;
use App\Repositories\Interfaces\LogRepositoryInterface;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Services\Interfaces\LikeServiceInterface;

class LikeService implements LikeServiceInterface
{

    protected $likeRepository;

    public function __construct(LikeRepositoryInterface $likeRepository)
    {
        $this->likeRepository = $likeRepository;
    }
    
    public function getLikeByUser($id_user)
    {
        return $this->likeRepository->getLikeByUser($id_user);
    }

    public function getLikeByArticle($id_article)
    {
        return $this->likeRepository->getLikeByArticle($id_article);
    }

    public function createLike(LikeRequest $request)
    {
        return $this->likeRepository->createLike([
            'id_user' => $request->id_user,
            'id_article' => $request->id_article,
        ]);
    }

    public function deleteLike($id)
    {
        return $this->likeRepository->deleteLike($id);
    }
}


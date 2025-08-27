<?php

namespace App\Services\Implementations;

use App\Services\Interfaces\PusherServiceInterface;

use App\Http\Requests\LikeRequest;
use App\Repositories\Interfaces\LikeRepositoryInterface;
use App\Repositories\Interfaces\LogRepositoryInterface;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Services\Interfaces\LikeServiceInterface;

class LikeService implements LikeServiceInterface
{
    protected $pusherService;
    protected $likeRepository;
    protected $logRepository;
    protected $userRepository;
    protected $notificationRepository;
    protected $articleRepository;

    public function __construct(
        PusherServiceInterface $pusherService,
        LikeRepositoryInterface $likeRepository,
        LogRepositoryInterface $logRepository,
        NotificationRepositoryInterface $notificationRepository,
        UserRepositoryInterface $userRepository,
        ArticleRepositoryInterface $articleRepository
    ) {
        $this->pusherService = $pusherService;
        $this->likeRepository = $likeRepository;
        $this->logRepository = $logRepository;
        $this->notificationRepository = $notificationRepository;
        $this->userRepository = $userRepository;
        $this->articleRepository = $articleRepository;
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
        $user = $this->userRepository->getUser();
        $artikel = $this->articleRepository->getArticleById($request->id_article);
        $like = $this->likeRepository->createLike([
            'id_user' => $user->id_user,
            'id_article' => $request->id_article,
        ]);
        if ($like) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Menyukai artikel',
                'description' => $user->email . ' Menyukai artikel',
            ]);
            $this->notificationRepository->createNotification([
                'id_user' => $artikel->id_user,
                'title' => 'Menyukai artikel',
                'description' => $user->email . ' Menyukai artikel',
            ]);
            $this->pusherService->sendPusher(
                [$artikel->id_user],
                'Menyukai artikel',
                $user->email . ' Menyukai artikel'
            );
        }
    }

    public function deleteLike($id)
    {
        return $this->likeRepository->deleteLike($id);
    }
}


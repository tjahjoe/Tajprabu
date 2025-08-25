<?php

namespace App\Services\Implementations;

use App\Http\Requests\ArticleRequest;

use App\Services\Implementations\NotificationService;

use App\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Repositories\Interfaces\LogRepositoryInterface;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\ArticleServiceInterface;
use Str;

class ArticleService implements ArticleServiceInterface
{
    protected $notificationService;
    protected $articleRepository;
    protected $logRepository;
    protected $notificationRepository;
    protected $userRepository;
    public function __construct(
        NotificationService $notificationService,
        ArticleRepositoryInterface $articleRepository,
        LogRepositoryInterface $logRepository,
        NotificationRepositoryInterface $notificationRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->notificationService = $notificationService;
        $this->articleRepository = $articleRepository;
        $this->logRepository = $logRepository;
        $this->notificationRepository = $notificationRepository;
        $this->userRepository = $userRepository;
    }
    public function getAllArticles()
    {
        return $this->articleRepository->getAllArticles();
    }

    public function getTrendingArticles()
    {
        return $this->articleRepository->getTrendingArticles();
    }

    public function getTrendingArticlesByTag($kodeTag)
    {
        return $this->articleRepository->getTrendingArticlesByTag($kodeTag);
    }

    public function getTrendingArticlesByTopic($kodeTopic)
    {
        return $this->articleRepository->getTrendingArticlesByTopic($kodeTopic);
    }

    public function getArticleByKode($kodeArticle)
    {
        return $this->articleRepository->getArticleByKode($kodeArticle);
    }

    public function createArticle(ArticleRequest $request)
    {
        $kodeArticle = Str::slug($request->title, '-');
        $user = $this->userRepository->getUser();

        $article = $this->articleRepository->createArticle([
            'id_user' => $user->id_user,
            'kode_article' => $kodeArticle,
            'title' => $request->title,
            'article' => $request->article,
        ]);

        if ($article) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Membuat artikel baru',
                'description' => $user->email . ' Membuat artikel baru',
            ]);


            $this->notificationService->createNotificationForRole(
                'Super Admin',
                'Membuat artikel baru',
                $user->email . 'Membuat artikel baru'
            );
        }
        return $article;

    }

    public function updateArticle($id, ArticleRequest $request)
    {
        $kodeArticle = Str::slug($request->title, '-');
        $user = $this->userRepository->getUser();

        $article = $this->articleRepository->updateArticle($id, [
            'id_user' => $user->id_user,
            'kode_article' => $kodeArticle,
            'title' => $request->title,
            'article' => $request->article,
        ]);

        if ($article) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Merbarui artikel',
                'description' => $user->email .  'Merbarui artikel',
            ]);

            $this->notificationService->createNotificationForRole(
                'Super Admin',
                'Merbarui artikel',
                $user->email . ' Merbarui artikel'
            );
        }
        return $article;
    }

    public function updateStatusArticle($id, ArticleRequest $request)
    {
        $user = $this->userRepository->getUser();
        $article = $this->articleRepository->updateArticle($id, [
            'status' => $request->status,
        ]);

        if ($article) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Merbarui status artikel',
                'description' => $user->email . ' Merbarui status artikel',
            ]);

            $this->notificationRepository->createNotification([
                'id_user' => $article->id_user,
                'title' => 'Merbarui status artikel',
                'description' => $user->email . ' Merbarui status artikel',
            ]);
        }
    }

    public function deleteArticle($id)
    {
        $user = $this->userRepository->getUser();
        $article = $this->articleRepository->deleteArticle($id);

        if ($article) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Menghapus artikel',
                'description' => $user->email . ' Menghapus artikel',
            ]);
            $this->notificationRepository->createNotification([
                'id_user' => $article->id_user,
                'title' => 'Menghapus artikel',
                'description' => $user->email . ' Menghapus artikel',
            ]);
        }
        return $article;
    }

    public function getTrashedArticles()
    {
        return $this->articleRepository->getTrashedArticles();
    }

    public function restoreArticle($id)
    {
        $user = $this->userRepository->getUser();
        $article = $this->articleRepository->restoreArticle($id);
        if ($article) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Mengembalikan artikel',
                'description' => $user->email . ' Mengembalikan artikel',
            ]);
            $this->notificationRepository->createNotification([
                'id_user' => $article->id_user,
                'title' => 'Mengembalikan artikel',
                'description' => $user->email . ' Mengembalikan artikel',
            ]);
        }
        return $article;
    }

    public function destroyArticle($id)
    {
        $user = $this->userRepository->getUser();
        $article = $this->articleRepository->destroyArticle($id);
        if ($article) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Menghapus permanen artikel',
                'description' => $user->email . ' Menghapus permanen artikel',
            ]);
            $this->notificationRepository->createNotification([
                'id_user' => $article->id_user,
                'title' => 'Menghapus permanen artikel',
                'description' => $user->email . ' Menghapus permanen artikel',
            ]);
        }
        return $article;
    }
}


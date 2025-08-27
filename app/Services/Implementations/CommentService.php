<?php

namespace App\Services\Implementations;

use App\Services\Interfaces\PusherServiceInterface;

use App\Http\Requests\CommentRequest;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Repositories\Interfaces\LogRepositoryInterface;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Services\Interfaces\CommentServiceInterface;

class CommentService implements CommentServiceInterface
{
    protected $pusherService;
    protected $commentRepository;
    protected $logRepository;
    protected $notificationRepository;
    protected $userRepository;
    protected $articleRepository;

    public function __construct(
        PusherServiceInterface $pusherService,
        CommentRepositoryInterface $commentRepository,
        LogRepositoryInterface $logRepository,
        NotificationRepositoryInterface $notificationRepository,
        UserRepositoryInterface $userRepository,
        ArticleRepositoryInterface $articleRepository
    ) {
        $this->pusherService = $pusherService;
        $this->commentRepository = $commentRepository;
        $this->logRepository = $logRepository;
        $this->notificationRepository = $notificationRepository;
        $this->userRepository = $userRepository;
        $this->articleRepository = $articleRepository;
    }

    public function getCommentByArticle($id_article)
    {
        return $this->commentRepository->getCommentByArticle($id_article);
    }

    public function createComment(CommentRequest $request)
    {
        $user = $this->userRepository->getUser();
        $article = $this->articleRepository->getArticleById($request->id_article);
        $data = $request->only([
            'id_article',
            'comment',
        ]);

        $data['id_user'] = $user->id_user;

        if ($request->filled('Id_parent')) {
            $data['id_parent'] = $request->id_parent;
        }

        $comment = $this->commentRepository->createComment($data);

        if ($comment) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Membuat komentar baru',
                'description' => $user->email . ' Membuat komentar baru',
            ]);
            $this->notificationRepository->createNotification([
                'id_user' => $article->id_user,
                'activity' => 'Membuat komentar baru',
                'description' => $user->email . ' Membuat komentar baru',
            ]);

            $emails = [
                $article->user->email,
            ];

            if ($request->filled('Id_parent')) {
                $this->notificationRepository->createNotification([
                    'id_user' => $request->id_parent,
                    'activity' => 'Membuat komentar baru',
                    'description' => $user->email . ' Membuat komentar baru',
                ]);

                $perentComment = $this->commentRepository->getCommentById($request->id_parent);
                $emails[] = $perentComment->user->email;
            }

            $this->pusherService->sendPusher(
                $emails,
                'Membuat komentar baru',
                $user->email . ' Membuat komentar baru'
            );
        }

    }


    public function updateComment($id, CommentRequest $request)
    {
        $user = $this->userRepository->getUser();
        $data = $request->only([
            'id_article',
            'id_user',
            'comment',
        ]);

        if ($request->filled('Id_parent')) {
            $data['id_parent'] = $request->id_parent;
        }

        $comment = $this->commentRepository->updateComment($id, $data);

        if ($comment) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Memperbarui komentar',
                'description' => $user->email . ' Memperbarui komentar',
            ]);
        }
    }
    public function deleteComment($id)
    {
        $user = $this->userRepository->getUser();
        $comment = $this->commentRepository->deleteComment($id);
        if ($comment) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Menghapus komentar',
                'description' => $user->email . ' Menghapus komentar',
            ]);
        }
    }

    public function getTrashedComments()
    {
        return $this->commentRepository->getTrashedComments();
    }

    public function restoreComment($id)
    {
        $user = $this->userRepository->getUser();
        $comment = $this->commentRepository->restoreComment($id);
        if ($comment) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Mengembalikan komentar',
                'description' => $user->email . ' Mengembalikan komentar',
            ]);
        }
    }

    public function destroyComment($id)
    {
        $user = $this->userRepository->getUser();
        $comment = $this->commentRepository->destroyComment($id);
        if ($comment) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Menghapus permanen komentar',
                'description' => $user->email . ' Menghapus permanen komentar',
            ]);
        }
    }
}


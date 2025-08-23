<?php

namespace App\Services\Implementations;

use App\Http\Requests\CommentRequest;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Services\Interfaces\CommentServiceInterface;

class CommentService implements CommentServiceInterface
{
    protected $commentRepository;

    public function __construct(CommentRepositoryInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function getCommentByArticle($id_article)
    {
        return $this->commentRepository->getCommentByArticle($id_article);
    }

    public function createComment(CommentRequest $request)
    {
        $data = $request->only([
            'id_article',
            'id_user',
            'comment',
        ]);

        if ($request->filled('Id_parent')) {
            $data['id_parent'] = $request->id_parent;
        }

        return $this->commentRepository->createComment($data);
    }


    public function updateComment($id, CommentRequest $request)
    {
        $data = $request->only([
            'id_article',
            'id_user',
            'comment',
        ]);

        if ($request->filled('Id_parent')) {
            $data['id_parent'] = $request->id_parent;
        }

        return $this->commentRepository->updateComment($id, $data);
    }
    public function deleteComment($id)
    {
        return $this->commentRepository->deleteComment($id);
    }

    public function getTrashedComments()
    {
        return $this->commentRepository->getTrashedComments();
    }

    public function restoreComment($id)
    {
        return $this->commentRepository->restoreComment($id);
    }

    public function destroyComment($id)
    {
        return $this->commentRepository->destroyComment($id);
    }
}


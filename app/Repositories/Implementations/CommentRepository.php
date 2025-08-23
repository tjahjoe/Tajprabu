<?php

namespace App\Repositories\Implementations;

use App\Models\CommentModel;
use App\Repositories\Interfaces\CommentRepositoryInterface;

class CommentRepository implements CommentRepositoryInterface
{
    public function getAllComments()
    {
        return CommentModel::get();
    }

    public function getCommentByArticle($id_article)
    {
        return CommentModel::find($id_article);
    }

    public function createComment($data)
    {
        return CommentModel::create($data) ? true : false;
    }

    public function updateComment($id, $data)
    {
        $Comment = CommentModel::findOrFail($id);
        return $Comment->update($data) ? true : false;
    }

    public function deleteComment($id)
    {
        $comment = CommentModel::findOrFail($id);
        return $comment->delete() ? true : false;
    } 

    public function getTrashedComments()
    {
        return CommentModel::onlyTrashed()->get();
    }

    public function restoreComment($id)
    {
        $comment = CommentModel::onlyTrashed()->findOrFail($id);
        return $comment->restore() ? true : false;
    }

    public function destroyComment($id)
    {
        $comment = CommentModel::withTrashed()->findOrFail($id);
        return $comment->forceDelete() ? true : false;
    }
}   
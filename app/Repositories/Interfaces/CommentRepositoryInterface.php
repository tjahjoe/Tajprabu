<?php

namespace App\Repositories\Interfaces;

interface CommentRepositoryInterface
{
    public function getAllComments();

    public function getCommentById($id);

    public function getCommentByArticleId();

    public function createComment(array $data);

    public function updateComment($id, array $data);

    public function deleteComment($id);
}
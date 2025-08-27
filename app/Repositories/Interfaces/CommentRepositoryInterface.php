<?php

namespace App\Repositories\Interfaces;

interface CommentRepositoryInterface
{


    public function getCommentByArticle($id_article);
    public function getCommentById($id);

    public function createComment(array $data);

    public function updateComment($id, array $data);

    public function deleteComment($id);

    public function getTrashedComments();

    public function restoreComment($id);

    public function destroyComment($id);
}
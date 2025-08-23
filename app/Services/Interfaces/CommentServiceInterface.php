<?php

namespace App\Services\Interfaces;

use App\Http\Requests\CommentRequest;

interface CommentServiceInterface
{

    public function getCommentByArticle($id_article);

    public function createComment(CommentRequest $request);

    public function updateComment($id, CommentRequest $request);

    public function deleteComment($id);

    public function getTrashedComments();

    public function restoreComment($id);

    public function destroyComment($id);
}
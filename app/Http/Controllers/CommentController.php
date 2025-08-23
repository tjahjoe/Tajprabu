<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\CommentServiceInterface;
use App\Http\Requests\CommentRequest;


class CommentController extends Controller
{
    protected $commentService;

    public function __construct(CommentServiceInterface $commentService)
    {
        $this->commentService = $commentService;
    }

    public function getCommentByArticle($id_article)
    {
        $comment = $this->commentService->getCommentByArticle($id_article);
        return response()->json($comment);
    }

    public function createComment(CommentRequest $request)
    {
        $comment = $this->commentService->createComment($request);
        return response()->json($comment);
    }

    public function updateComment($id, CommentRequest $request)
    {
        $comment = $this->commentService->updateComment($id, $request);
        return response()->json($comment);
    }

    public function deleteComment($id)
    {
        $comment = $this->commentService->deleteComment($id);
        return response()->json($comment);
    }

    public function getTrashedComments()
    {
        $comment = $this->commentService->getTrashedComments();
        return response()->json($comment);
    }

    public function restoreComment($id)
    {
        $comment = $this->commentService->restoreComment($id);
        return response()->json($comment);
    }

    public function destroyComment($id)
    {
        $comment = $this->commentService->destroyComment($id);
        return response()->json($comment);
    }


}

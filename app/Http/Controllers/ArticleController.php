<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\ArticleServiceInterface;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    protected $articleService;

    public function __construct(ArticleServiceInterface $articleService)
    {
        $this->articleService = $articleService;
    }

    public function getAllArticles()
    {
        $articles = $this->articleService->getAllArticles();
        return response()->json($articles);
    }

    public function getArticleByKode($kode)
    {
        $article = $this->articleService->getArticleByKode($kode);
        return response()->json($article);
    }

    public function createArticle(ArticleRequest $request)
    {
        $article = $this->articleService->createArticle($request);
        return response()->json($article);
    }

    public function updateArticle($id, ArticleRequest $request)
    {
        $article = $this->articleService->updateArticle($id, $request);
        return response()->json($article);
    }

    public function deleteArticle($id)
    {
        $article = $this->articleService->deleteArticle($id);
        return response()->json($article);
    }

    public function getTrashedArticles()
    {
        $articles = $this->articleService->getTrashedArticles();
        return response()->json($articles);
    }

    public function restoreArticle($id)
    {
        $article = $this->articleService->restoreArticle($id);
        return response()->json($article);
    }

    public function destroyArticle($id)
    {
        $article = $this->articleService->destroyArticle($id);
        return response()->json($article);
    }
}

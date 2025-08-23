<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\ArticleServiceInterface;
use App\Services\Interfaces\TagServiceInterface;
use App\Services\Interfaces\TopicServiceInterface;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    protected $articleService;
    protected $tagService;
    protected $topicService;

    public function __construct(
        ArticleServiceInterface $articleService,
        TagServiceInterface $tagService,
        TopicServiceInterface $topicServiceInterface
        )
    {
        $this->articleService = $articleService;
        $this->tagService = $tagService;
        $this->topicService = $topicServiceInterface;
    }

    public function getAllArticles()
    {
        $articles = $this->articleService->getAllArticles();
        $trendingArticles = $this->articleService->getTrendingArticles();
        $trendingTags = $this->tagService->getTrendingTags();
        $trendingTopics = $this->topicService->getTrendingTopics();
        $trendingTagsByArticle = $this->tagService->getTrendingTagsByArticle($articles[0]->kode_article);
        $trendingTopicsByArticle = $this->topicService->getTrendingTopicsByArticle($articles[0]->kode_article);
        
        return response()->json($trendingTagsByArticle);
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

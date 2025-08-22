<?php

namespace App\Services\Interfaces;

use App\Http\Requests\ArticleRequest;

interface ArticleServiceInterface
{
    public function getAllArticles();

    public function getArticleByKode($kode);

    public function createArticle(ArticleRequest $request);

    public function updateArticle($id, ArticleRequest $request);

    public function deleteArticle($id);

    public function getTrashedArticles();

    public function restoreArticle($id);

    public function destroyArticle($id);
}
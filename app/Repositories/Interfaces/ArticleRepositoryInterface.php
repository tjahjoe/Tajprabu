<?php

namespace App\Repositories\Interfaces;

interface ArticleRepositoryInterface
{
    public function getAllArticles();

    public function getArticleByKode($kode);

    public function createArticle(array $data);

    public function updateArticle($id, array $data);

    public function deleteArticle($id);

    public function getTrashedArticles();

    public function restoreArticle($id);

    public function destroyArticle($id);
}
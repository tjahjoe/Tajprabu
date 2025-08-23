<?php

namespace App\Repositories\Interfaces;

interface LikeRepositoryInterface
{
    public function getLikeByUser($id);
    public function getLikeByArticle($idArticle);
    public function createLike(array $data);
    public function deleteLike($id);
}
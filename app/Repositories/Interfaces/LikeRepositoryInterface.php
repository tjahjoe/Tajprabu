<?php

namespace App\Repositories\Interfaces;

interface LikeRepositoryInterface
{
    // public function getAllLikes();
    public function getLikeByUser($id);
    public function getLikeByArticle($id);
    public function createLike(array $data);
    public function deleteLike($id);
}
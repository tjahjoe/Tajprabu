<?php

namespace App\Repositories\Interfaces;

interface LikeRepositoryInterface
{
    public function getAllLikes();
    public function getLikeById($id);
    public function createLike(array $data);
    public function deleteLike($id);
}
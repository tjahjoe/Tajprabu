<?php

namespace App\Repositories\Implementations;

use App\Models\LikeModel;
use App\Repositories\Interfaces\LikeRepositoryInterface;

class LikeRepository implements LikeRepositoryInterface
{
    // public function getAllLikes()
    // {
    //     return LikeModel::get();
    // }

    public function getLikeByUser($id_user)
    {
        return LikeModel::firstWhere('id_user', $id_user);
    }

    public function getLikeByArticle($id_article)
    {
        return LikeModel::firstWhere('id_article', $id_article);
    }

    public function createLike(array $data)
    {
        return LikeModel::create($data) ? true : false;
    }

    public function deleteLike($id)
    {
        $like = LikeModel::findOrFail($id);
        return $like->delete() ? true : false;
    }
}
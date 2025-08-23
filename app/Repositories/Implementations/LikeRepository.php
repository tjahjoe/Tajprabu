<?php

namespace App\Repositories\Implementations;

use App\Models\LikeModel;
use App\Repositories\Interfaces\LikeRepositoryInterface;

class LikeRepository implements LikeRepositoryInterface
{

    public function getLikeByUser($id)
    {
        return LikeModel::firstWhere('id_user', $id);
    }

    public function getLikeByArticle($idArticle)
    {
        return LikeModel::firstWhere('id_article', $idArticle);
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
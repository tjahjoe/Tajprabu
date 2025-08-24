<?php

namespace App\Services\Interfaces;

use App\Http\Requests\LikeRequest;

interface LikeServiceInterface
{
    public function getLikeByUser($id_user);

    public function getLikeByArticle($id_article);

    public function createLike(LikeRequest $request);

    public function deleteLike($id);
}
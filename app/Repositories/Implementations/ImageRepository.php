<?php

namespace App\Repositories\Implementations;

use App\Models\ImageModel;
use App\Repositories\Interfaces\ImageRepositoryInterface;

class ImageRepository implements ImageRepositoryInterface
{
    public function getImagesByArticle($idArticle)
    {
        return ImageModel::where('id_article', $idArticle)->get();
    }

    public function createImage(array $data)
    {
        return ImageModel::create($data) ? true : false;
    }

    public function getByIds($ids){
        return ImageModel::whereIn('id', $ids)->get();
    }

    public function deleteImages(array $ids)
    {
        $Image = ImageModel::whereIn('id', $ids);
        return $Image->delete() ? true : false;
    }
}
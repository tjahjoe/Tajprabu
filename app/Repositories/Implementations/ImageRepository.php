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

    public function createImage($data)
    {
        return ImageModel::create($data) ? true : false;
    }

    public function getByIds($ids){
        return ImageModel::whereIn('id_image', $ids)->get();
    }

    public function deleteImages($ids)
    {
        $Image = ImageModel::whereIn('id_image', $ids);
        return $Image->delete() ? true : false;
    }
}
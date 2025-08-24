<?php

namespace App\Repositories\Interfaces;

interface ImageRepositoryInterface
{

    public function getImagesByArticle($idArticle);

    public function getImageById($id);

    public function createImage(array $data);

    public function updateImage($id, array $data);

    public function getByIds($ids);

    public function deleteImages(array $id);
}
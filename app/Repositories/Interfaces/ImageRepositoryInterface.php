<?php

namespace App\Repositories\Interfaces;

interface ImageRepositoryInterface
{

    public function getImagesByArticle($idArticle);

    public function createImage(array $data);

    public function getByIds($ids);

    public function deleteImages(array $id);
}
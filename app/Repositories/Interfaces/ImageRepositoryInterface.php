<?php

namespace App\Repositories\Interfaces;

interface ImageRepositoryInterface
{
    public function getAllImages();

    public function getImageById($id);

    public function getImagesByArticleId($articleId);

    public function createImage(array $data);

    public function updateImage($id, array $data);

    public function deleteImage($id);
}
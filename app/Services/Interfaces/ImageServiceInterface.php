<?php

namespace App\Services\Interfaces;

use App\Http\Requests\ImageRequest;
use App\Http\Requests\DeleteImageRequest;

interface ImageServiceInterface
{
    public function getImagesByArticle($idArticle);

    public function createImages(ImageRequest $request);

    public  function updateImage($id, ImageRequest $request);

    public function deleteImages(DeleteImageRequest $request);
}
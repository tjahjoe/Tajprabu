<?php

namespace App\Services\Interfaces;

use App\Http\Requests\ImageRequest;
use Illuminate\Http\Request;

interface ImageServiceInterface
{
    public function getImagesByArticle($idArticle);

    public function createImages(ImageRequest $request);

    public function deleteImages(Request $request);
}
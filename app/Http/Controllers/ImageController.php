<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteImageRequest;
use Illuminate\Http\Request;
use App\Services\Interfaces\ImageServiceInterface;
use App\Http\Requests\ImageRequest;


class ImageController extends Controller
{
    protected $imageService;
    public function __construct(ImageServiceInterface $imageService)
    {
        $this->imageService = $imageService;
    }

    public function getImagesByArticle($idArticle)
    {
        return $this->imageService->getImagesByArticle($idArticle);
    }

    public function createImages(ImageRequest $request)
    {
        return $this->imageService->createImages($request);
    }

    public function deleteImages(DeleteImageRequest $request)
    {
        return $this->imageService->deleteImages($request);
    }
}

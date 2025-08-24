<?php

namespace App\Services\Implementations;

use App\Http\Requests\DeleteImageRequest;
use App\Http\Requests\ImageRequest;
use App\Repositories\Interfaces\ImageRepositoryInterface;
use App\Services\Interfaces\ImageServiceInterface;
use Storage;

class ImageService implements ImageServiceInterface
{

    protected $imageRepository;

    public function __construct(ImageRepositoryInterface $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    public function getImagesByArticle($idArticle)
    {
        return $this->imageRepository->getImagesByArticle($idArticle);
    }

    public function createImages(ImageRequest $request)
    {
        $files = $request->file('images');
        $descriptions = $request->descriptions;
        $data = [];

        foreach ($files as $i => $file) {
            $path = Storage::disk('s3')->put('posters', $file);

            $data[] = $this->imageRepository->createImage([
                'id_article' => $request->id_article,
                'description' => $descriptions[$i],
                'path' => $path,
            ]);
        }
        return $data;
    }


    public function deleteImages(DeleteImageRequest $request)
    {
        $ids = $request->ids;
        if (!$ids || count($ids) === 0) {
            return false;
        }

        $images = $this->imageRepository->getByIds($ids);

        foreach ($images as $image) {
            if ($image->path) {
                Storage::disk('s3')->delete($image->path);
            }
        }

        return $this->imageRepository->deleteImages($ids);
    }
}


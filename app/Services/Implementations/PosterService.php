<?php

namespace App\Services\Implementations;

use App\Http\Requests\PosterRequest;
use App\Repositories\Interfaces\PosterRepositoryInterface;
use App\Repositories\Interfaces\LogRepositoryInterface;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Services\Interfaces\PosterServiceInterface;
use Storage;

class PosterService implements PosterServiceInterface
{
    protected $posterRepository;

    public function __construct(PosterRepositoryInterface $posterRepository)
    {
        $this->posterRepository = $posterRepository;
    }
    public function getAllPosters()
    {
        return $this->posterRepository->getAllPosters();
    }
    public function getPostersByActive($status)
    {
        return $this->posterRepository->getPostersByActive($status);
    }

    public function getPosterById($id)
    {
        return $this->posterRepository->getPosterById($id);
    }

    public function createPoster(PosterRequest $request)
    {
        $file = $request->file('poster');
        $path = Storage::disk('s3')->put('posters', $file);

        return $this->posterRepository->createPoster([
            'id_user' => $request->id_user,
            'path' => $path,
        ]);
    }

    public function updatePoster($id, $path, PosterRequest $request)
    {
        $data = $this->posterRepository->updatePoster($id, [
            'id_user' => $request->id_user,
            'status' => $request->status,
            'status_active' => $request->status_active,
        ]);

        if ($request->hasFile('poster')) {

            if ($path) {
                Storage::disk('s3')->delete($path);
            }

            $file = $request->file('poster');
            $newPath = Storage::disk('s3')->put('posters', $file);

            $data['path'] = $newPath;
        }

        return $this->posterRepository->updatePoster($id, $data);
    }
    public function deletePoster($id)
    {
        return $this->posterRepository->deletePoster($id);
    }

    public function getTrashedPosters()
    {
        return $this->posterRepository->getTrashedPosters();
    }

    public function restorePoster($id)
    {
        return $this->posterRepository->restorePoster($id);
    }

    public function destroyPoster($id, $path)
    {
        if ($path) {
            Storage::disk('s3')->delete($path);
        }

        return $this->posterRepository->destroyPoster($id);
    }
}


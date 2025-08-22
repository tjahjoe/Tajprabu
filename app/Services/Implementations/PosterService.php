<?php

namespace App\Services\Implementations;

use App\Http\Requests\PosterRequest;
use App\Repositories\Interfaces\PosterRepositoryInterface;
use App\Services\Interfaces\PosterServiceInterface;

class PosterService implements PosterServiceInterface{
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
        return $this->posterRepository->createPoster([
            'id_user' => $request->input('id_user'),
            'path' => time().'.jpg',
        ]);
    }

    public function updatePoster($id, PosterRequest $request)
    {
        return $this->posterRepository->updatePoster($id, [
            'id_user' => $request->id_user,
            'path' => time().'.jpg',
            'status' => $request->status,
            'status_active' => $request->status_active,
        ]);
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

    public function destroyPoster($id)
    {
        return $this->posterRepository->destroyPoster($id);
    }
}


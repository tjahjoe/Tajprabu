<?php

namespace App\Repositories\Interfaces;

interface PosterRepositoryInterface
{
    public function getAllPosters();

    public function getPostersByActive($status);

    public function getPosterById($id);

    public function createPoster(array $data);

    public function updatePoster($id, array $data);

    public function deletePoster($id);

    public function getTrashedPosters();

    public function restorePoster($id);

    public function destroyPoster($id);
}
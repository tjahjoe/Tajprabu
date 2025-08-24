<?php

namespace App\Services\Interfaces;

use App\Http\Requests\PosterRequest;

interface PosterServiceInterface
{
    public function getAllPosters();

    public function getPostersByActive($status);

    public function getPosterById($id);

    public function createPoster(PosterRequest $request);

    public function updatePoster($id, PosterRequest $request);

    public function deletePoster($id);

    public function getTrashedPosters();

    public function restorePoster($id);
    
    public function destroyPoster($id, $path);
}
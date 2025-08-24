<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\PosterServiceInterface;
use App\Http\Requests\PosterRequest;
use Illuminate\Http\Request;

class PosterController extends Controller
{
    protected $posterService;

    public function __construct(PosterServiceInterface $posterService)
    {
        $this->posterService = $posterService;
    }

    public function getAllPosters()
    {
        $posters = $this->posterService->getAllPosters();
        return response()->json($posters);
    }
    
    public function getPostersByActive($status)
    {
        $posters = $this->posterService->getPostersByActive($status);
        return response()->json($posters);
    }

    public function getPosterById($id)
    {
        $poster = $this->posterService->getPosterById($id);
        return response()->json($poster);
    }

    public function createPoster(PosterRequest $request)
    {
        $poster = $this->posterService->createPoster($request);
        return response()->json($poster);
    }

    public function updatePoster($id, PosterRequest $request)
    {
        $poster = $this->posterService->updatePoster($id, $request);
        return response()->json($poster);
    }

    public function deletePoster($id)
    {
        $poster = $this->posterService->deletePoster($id);
        return response()->json($poster);
    }

    public function getTrashedPosters()
    {
        $posters = $this->posterService->getTrashedPosters();
        return response()->json($posters);
    }


    public function restorePoster($id)
    {
        $poster = $this->posterService->restorePoster($id);
        return response()->json($poster);
    }

    public function destroyPoster($id, $path)
    {
        $poster = $this->posterService->destroyPoster($id, $path);
        return response()->json($poster);
    }
}

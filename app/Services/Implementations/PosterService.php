<?php

namespace App\Services\Implementations;

use App\Http\Requests\PosterRequest;

use App\Services\Implementations\NotificationService;

use App\Repositories\Interfaces\PosterRepositoryInterface;
use App\Repositories\Interfaces\LogRepositoryInterface;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\PosterServiceInterface;
use Storage;

class PosterService implements PosterServiceInterface
{
    protected $notificationService;
    protected $posterRepository;
    protected $logRepository;
    protected $notificationRepository;
    protected $userRepository;

    public function __construct(
        NotificationService $notificationService,
        PosterRepositoryInterface $posterRepository,
        LogRepositoryInterface $logRepository,
        NotificationRepositoryInterface $notificationRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->notificationService = $notificationService;
        $this->posterRepository = $posterRepository;
        $this->logRepository = $logRepository;
        $this->notificationRepository = $notificationRepository;
        $this->userRepository = $userRepository;
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

        $user = $this->userRepository->getUser();

        $poster = $this->posterRepository->createPoster([
            'id_user' => $request->id_user, //$user->id_user
            'path' => $path,
        ]);

        if ($poster) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                // 'id_user' => 1,
                'activity' => 'Membuat poster baru',
                'description' => $user->email . ' Membuat poster baru',
                // 'description' => ' Membuat poster baru',
            ]);


            $this->notificationService->createNotificationForAdmin(
                'Membuat poster baru',
                $user->email . 'Membuat poster baru'
                // 'Membuat poster baru'
            );
        }

        return $poster;
    }

    public function updatePoster($id, PosterRequest $request)
    {
        $user = $this->userRepository->getUser();
        $data = [
            'id_user' => $request->id_user, //$user->id_user
            'status' => $request->status,
        ];

        $path = $this->posterRepository->getPosterById($id)->path;

        if ($request->hasFile('poster')) {

            if ($path) {
                Storage::disk('s3')->delete($path);
            }

            $file = $request->file('poster');
            $newPath = Storage::disk('s3')->put('posters', $file);

            $data['path'] = $newPath;
        }

        $poster = $this->posterRepository->updatePoster($id, $data);

        if ($poster) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                // 'id_user' => 1,
                'activity' => 'Merbarui artikel',
                // 'description' => 'Merbarui artikel',
                'description' => $user->email .  ' Merbarui artikel',
            ]);

            $this->notificationService->createNotificationForAdmin(
                'Merbarui artikel',
                $user->email . ' Merbarui artikel'
                // 'Merbarui artikel'
            );
        }

        return $poster;
    }

    public function updateStatusPoster($id, PosterRequest $request)
    {
        $user = $this->userRepository->getUser();
        $poster = $this->posterRepository->updatePoster($id, [
            'status' => $request->status,
        ]);

        if ($poster) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Merbarui status poster',
                'description' => $user->email . ' Merbarui status poster',
            ]);

            $this->notificationRepository->createNotification([
                'id_user' => $poster->id_user,
                'title' => 'Merbarui status poster',
                'description' => $user->email . ' Merbarui status poster',
            ]);
        }

        return $poster;
    }

    public function deletePoster($id)
    {
        $user = $this->userRepository->getUser();
        $poster = $this->posterRepository->deletePoster($id);

        if ($poster) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                // 'id_user' => 1,
                'activity' => 'Menghapus poster',
                'description' => $user->email . ' Menghapus poster',
                // 'description' => 'Menghapus poster',
            ]);
            $this->notificationRepository->createNotification([
                'id_user' => $poster->id_user,
                'title' => 'Menghapus poster',
                // 'description' => 'Menghapus poster',
                'description' => $user->email . ' Menghapus poster',
            ]);
        }
        return $poster;
    }

    public function getTrashedPosters()
    {
        return $this->posterRepository->getTrashedPosters();
    }

    public function restorePoster($id)
    {
        $user = $this->userRepository->getUser();
        $poster = $this->posterRepository->restorePoster($id);

        if ($poster) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                // 'id_user' => 1,
                'activity' => 'Mengembalikan poster',
                'description' => $user->email . ' Mengembalikan poster',
                // 'description' => 'Mengembalikan poster',
            ]);
            $this->notificationRepository->createNotification([
                'id_user' => $poster->id_user,
                'title' => 'Mengembalikan poster',
                'description' => $user->email . ' Mengembalikan poster',
                // 'description' => 'Mengembalikan poster',
            ]);
        }
        return $poster;
    }

    public function destroyPoster($id)
    {

        $user = $this->userRepository->getUser();
        $poster = $this->posterRepository->destroyPoster($id);

        if ($poster) {

            Storage::disk('s3')->delete($poster->path);

            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                // 'id_user' => 1,
                'activity' => 'Menghapus permanen poster',
                'description' => $user->email . ' Menghapus permanen poster',
                // 'description' => 'Menghapus permanen poster',
            ]);
            $this->notificationRepository->createNotification([
                'id_user' => $poster->id_user,
                'title' => 'Menghapus permanen poster',
                'description' => $user->email . ' Menghapus permanen poster',
                // 'description' => 'Menghapus permanen poster',
            ]);
        }
        return $poster;
    }
}


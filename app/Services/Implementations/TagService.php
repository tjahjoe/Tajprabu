<?php

namespace App\Services\Implementations;

use App\Services\Interfaces\NotificationServiceInterface;

use App\Http\Requests\TagRequest;
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Repositories\Interfaces\LogRepositoryInterface;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\TagServiceInterface;
use Str;

class TagService implements TagServiceInterface{
    protected $notificationService;
    protected $tagRepository;
    protected $logRepository;
    protected $notificationRepository;
    protected $userRepository;

    public function __construct(
        NotificationServiceInterface $notificationService,
        TagRepositoryInterface $tagRepository,
        LogRepositoryInterface $logRepository,
        NotificationRepositoryInterface $notificationRepository,
        UserRepositoryInterface $userRepository
        )
    {
        $this->notificationService = $notificationService;
        $this->tagRepository = $tagRepository;
        $this->logRepository = $logRepository;
        $this->notificationRepository = $notificationRepository;
        $this->userRepository = $userRepository;
    }
    public function getAllTags()
    {
        return $this->tagRepository->getAllTags();
    }

    public function getTrendingTags()
    {
        return $this->tagRepository->getTrendingTags();
    }

    public function getTrendingTagsByArticle($kodeArticle)
    {
        return $this->tagRepository->getTrendingTagsByArticle($kodeArticle);
    }

    public function getTagByKode($kodeTag)
    {
        return $this->tagRepository->getTagByKode($kodeTag);
    }

    public function getArticlesByTag($kodeTag)
    {
        return $this->tagRepository->getArticlesByTag($kodeTag);
    }

    public function createTag(TagRequest $request)
    {
        $kodeTag = Str::slug($request->tag, '-');
        $user = $this->userRepository->getUser();

        $tag = $this->tagRepository->createTag([
            'kode_tag' => $kodeTag,
            'tag' => $request->tag,
        ]);

        if ($tag) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Membuat tag baru',
                'description' => $user->email . ' Membuat tag baru',
            ]);

            $this->notificationService->createNotificationForRole(
                'Super Admin',
                'Membuat tag baru',
                $user->email . 'Membuat tag baru'
            );
            $this->notificationService->createNotificationForRole(
                'Admin',
                'Membuat tag baru',
                $user->email . 'Membuat tag baru'
            );
        }
        return $tag;
    }

    public function updateTag($id, TagRequest $request)
    {
        $kodeTag = Str::slug($request->tag, '-');
        $user = $this->userRepository->getUser();

        $tag = $this->tagRepository->updateTag($id, [
            'kode_tag' => $kodeTag,
            'tag' => $request->tag,
        ]);

        if ($tag) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Merbarui tag',
                'description' => $user->email . ' Merbarui tag',
            ]);
            $this->notificationService->createNotificationForRole(
                'Super Admin',
                'Merbarui tag',
                $user->email . ' Merbarui tag'
            );
            $this->notificationService->createNotificationForRole(
                'Admin',
                'Merbarui tag',
                $user->email . ' Merbarui tag'
            );
        }
        return $tag;
    }

    public function deleteTag($id)
    {
        $user = $this->userRepository->getUser();
        $tag = $this->tagRepository->deleteTag($id);

        if ($tag) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Menghapus tag',
                'description' => $user->email . ' Menghapus tag',
            ]);
            $this->notificationService->createNotificationForRole(
                'Super Admin',
                'Menghapus tag',
                $user->email . 'Menghapus tag'
            );
            $this->notificationService->createNotificationForRole(
                'Admin',
                'Menghapus tag',
                $user->email . 'Menghapus tag'
            );
        }
        return $tag;
    }

    public function getTrashedTags()
    {
        return $this->tagRepository->getTrashedTags();
    }

    public function restoreTag($id)
    {
        $user = $this->userRepository->getUser();
        $tag = $this->tagRepository->restoreTag($id);

        if ($tag) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Mengembalikan tag',
                'description' => $user->email . ' Mengembalikan tag',
            ]);
            $this->notificationService->createNotificationForRole(
                'Super Admin',
                'Mengembalikan tag',
                $user->email . 'Mengembalikan tag'
            );
            $this->notificationService->createNotificationForRole(
                'Admin',
                'Mengembalikan tag',
                $user->email . 'Mengembalikan tag'
            );
        }
        return $tag;
    }

    public function destroyTag($id)
    {
        $user = $this->userRepository->getUser();
        $tag = $this->tagRepository->destroyTag($id);
        if ($tag) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Menghapus permanen tag',
                'description' => $user->email . ' Menghapus permanen tag',
            ]);
            $this->notificationService->createNotificationForRole(
                'Super Admin',
                'Menghapus permanen tag',
                $user->email . 'Menghapus permanen tag'
            );
            $this->notificationService->createNotificationForRole(
                'Admin',
                'Menghapus permanen tag',
                $user->email . 'Menghapus permanen tag'
            );
        }
        return $tag;
    }
}


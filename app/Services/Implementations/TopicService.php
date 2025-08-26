<?php

namespace App\Services\Implementations;

use App\Services\Interfaces\NotificationServiceInterface;

use App\Http\Requests\TopicRequest;
use App\Repositories\Interfaces\TopicRepositoryInterface;
use App\Repositories\Interfaces\LogRepositoryInterface;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\TopicServiceInterface;
use Str;

class TopicService implements TopicServiceInterface
{
    protected $notificationService;
    protected $topicRepository;
    protected $logRepository;
    protected $notificationRepository;
    protected $userRepository;

    public function __construct(
        NotificationServiceInterface $notificationService,
        TopicRepositoryInterface $topicRepository,
        LogRepositoryInterface $logRepository,
        NotificationRepositoryInterface $notificationRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->notificationService = $notificationService;
        $this->topicRepository = $topicRepository;
        $this->logRepository = $logRepository;
        $this->notificationRepository = $notificationRepository;
        $this->userRepository = $userRepository;
    }
    public function getAllTopics()
    {
        return $this->topicRepository->getAllTopics();
    }

    public function getTrendingTopicsByArticle($kodeArticle)
    {
        return $this->topicRepository->getTrendingTopicsByArticle($kodeArticle);
    }

    public function getTrendingTopics()
    {
        return $this->topicRepository->getTrendingTopics();
    }

    public function getTopicByKode($kodeTopic)
    {
        return $this->topicRepository->getTopicByKode($kodeTopic);
    }

    public function getAticlesByTopic($kodeTopic)
    {
        return $this->topicRepository->getAticlesByTopic($kodeTopic);
    }

    public function createTopic(TopicRequest $request)
    {
        $kodeTopic = Str::slug($request->topic, '-');
        $user = $this->userRepository->getUser();

        $topic = $this->topicRepository->createTopic([
            'kode_topic' => $kodeTopic,
            'topic' => $request->topic,
        ]);

        if ($topic) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Membuat topic baru',
                'description' => $user->email . ' Membuat topic baru',
            ]);

            $this->notificationService->createNotificationForRole(
                'Super Admin',
                'Membuat topic baru',
                $user->email . 'Membuat topic baru'
            );
            $this->notificationService->createNotificationForRole(
                'Admin',
                'Membuat topic baru',
                $user->email . 'Membuat topic baru'
            );
        }
        return $topic;
    }

    public function updateTopic($id, TopicRequest $request)
    {
        $kodeTopic = Str::slug($request->topic, '-');
        $user = $this->userRepository->getUser();

        $topic = $this->topicRepository->updateTopic($id, [
            'kode_topic' => $kodeTopic,
            'topic' => $request->topic,
        ]);

        if ($topic) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Merbarui topic',
                'description' => $user->email . ' Merbarui topic',
            ]);
            $this->notificationService->createNotificationForRole(
                'Super Admin',
                'Merbarui topic',
                $user->email . ' Merbarui topic'
            );
            $this->notificationService->createNotificationForRole(
                'Admin',
                'Merbarui topic',
                $user->email . ' Merbarui topic'
            );
        }
        return $topic;
    }

    public function deleteTopic($id)
    {
        $user = $this->userRepository->getUser();
        $topic = $this->topicRepository->deleteTopic($id);

        if ($topic) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Menghapus topic',
                'description' => $user->email . ' Menghapus topic',
            ]);
            $this->notificationService->createNotificationForRole(
                'Super Admin',
                'Menghapus topic',
                $user->email . 'Menghapus topic'
            );
            $this->notificationService->createNotificationForRole(
                'Admin',
                'Menghapus topic',
                $user->email . 'Menghapus topic'
            );
        }
        return $topic;
    }

    public function getTrashedTopics()
    {
        return $this->topicRepository->getTrashedTopics();
    }

    public function restoreTopic($id)
    {
        $user = $this->userRepository->getUser();
        $topic = $this->topicRepository->restoreTopic($id);
        if ($topic) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Mengembalikan topic',
                'description' => $user->email . ' Mengembalikan topic',
            ]);
            $this->notificationService->createNotificationForRole(
                'Super Admin',
                'Mengembalikan topic',
                $user->email . 'Mengembalikan topic'
            );
            $this->notificationService->createNotificationForRole(
                'Admin',
                'Mengembalikan topic',
                $user->email . 'Mengembalikan topic'
            );
        }
        return $topic;
        
    }

    public function destroyTopic($id)
    {
        $user = $this->userRepository->getUser();
        $topic = $this->topicRepository->destroyTopic($id);
        if ($topic) {
            $this->logRepository->createLog([
                'id_user' => $user->id_user,
                'activity' => 'Menghapus permanen topic',
                'description' => $user->email . ' Menghapus permanen topic',
            ]);
            $this->notificationService->createNotificationForRole(
                'Super Admin',
                'Menghapus permanen topic',
                $user->email . 'Menghapus permanen topic'
            );
            $this->notificationService->createNotificationForRole(
                'Admin',
                'Menghapus permanen topic',
                $user->email . 'Menghapus permanen topic'
            );
        }
        return $topic;
    }
}


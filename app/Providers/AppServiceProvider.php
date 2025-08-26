<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\Interfaces\PosterServiceInterface;
use App\Services\Interfaces\TagServiceInterface;
use App\Services\Interfaces\TopicServiceInterface;
use App\Services\Interfaces\RoleServiceInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Services\Interfaces\ArticleServiceInterface;
use App\Services\Interfaces\ImageServiceInterface;
use App\Services\Interfaces\LikeServiceInterface;
use App\Services\Interfaces\CommentServiceInterface;
use App\Services\Interfaces\NotificationServiceInterface;
use App\Services\Interfaces\LogServiceInterface;
use App\Services\Interfaces\PusherServiceInterface;

use App\Services\Implementations\PosterService;
use App\Services\Implementations\TagService;
use App\Services\Implementations\TopicService;
use App\Services\Implementations\RoleService;
use App\Services\Implementations\UserService;
use App\Services\Implementations\ArticleService;
use App\Services\Implementations\ImageService;
use App\Services\Implementations\LikeService;
use App\Services\Implementations\CommentService;
use App\Services\Implementations\NotificationService;
use App\Services\Implementations\LogService;
use App\Services\Implementations\PusherService;

use App\Repositories\Interfaces\PosterRepositoryInterface;
use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Repositories\Interfaces\TopicRepositoryInterface;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Repositories\Interfaces\ImageRepositoryInterface;
use App\Repositories\Interfaces\LikeRepositoryInterface;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use App\Repositories\Interfaces\NotificationRepositoryInterface;
use App\Repositories\Interfaces\LogRepositoryInterface;

use App\Repositories\Implementations\PosterRepository;
use App\Repositories\Implementations\TagRepository;
use App\Repositories\Implementations\TopicRepository;
use App\Repositories\Implementations\RoleRepository;
use App\Repositories\Implementations\UserRepository;
use App\Repositories\Implementations\ArticleRepository;
use App\Repositories\Implementations\ImageRepository;
use App\Repositories\Implementations\LikeRepository;
use App\Repositories\Implementations\CommentRepository;
use App\Repositories\Implementations\NotificationRepository;
use App\Repositories\Implementations\LogRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PosterServiceInterface::class, PosterService::class);
        $this->app->bind(TagServiceInterface::class, TagService::class);
        $this->app->bind(TopicServiceInterface::class, TopicService::class);
        $this->app->bind(RoleServiceInterface::class, RoleService::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(ArticleServiceInterface::class, ArticleService::class);
        $this->app->bind(ImageServiceInterface::class, ImageService::class);
        $this->app->bind(LikeServiceInterface::class, LikeService::class);
        $this->app->bind(CommentServiceInterface::class, CommentService::class);
        $this->app->bind(NotificationServiceInterface::class, NotificationService::class);
        $this->app->bind(LogServiceInterface::class, LogService::class);
        $this->app->bind(PusherServiceInterface::class, PusherService::class);


        $this->app->bind(PosterRepositoryInterface::class, PosterRepository::class);
        $this->app->bind(TagRepositoryInterface::class, TagRepository::class);
        $this->app->bind(TopicRepositoryInterface::class, TopicRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);
        $this->app->bind(ImageRepositoryInterface::class, ImageRepository::class);
        $this->app->bind(LikeRepositoryInterface::class, LikeRepository::class);
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
        $this->app->bind(NotificationRepositoryInterface::class, NotificationRepository::class);
        $this->app->bind(LogRepositoryInterface::class, LogRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

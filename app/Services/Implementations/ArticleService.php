<?php

namespace App\Services\Implementations;

use App\Http\Requests\ArticleRequest;
use App\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Services\Interfaces\ArticleServiceInterface;
use Str;

class ArticleService implements ArticleServiceInterface
{

    protected $articleRepository;
    public function __construct(ArticleRepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }
    public function getAllArticles()
    {
        return $this->articleRepository->getAllArticles();
    }

    public function getTrendingArticles()
    {
        return $this->articleRepository->getTrendingArticles();
    }

    public function getTrendingArticlesByTag($kodeTag)
    {
        return $this->articleRepository->getTrendingArticlesByTag($kodeTag);
    }

    public function getTrendingArticlesByTopic($kodeTopic)
    {
        return $this->articleRepository->getTrendingArticlesByTopic($kodeTopic);
    }

    public function getArticleByKode($kodeArticle)
    {
        return $this->articleRepository->getArticleByKode($kodeArticle);
    }

    public function createArticle(ArticleRequest $request)
    {
        $kodeArticle = Str::slug($request->title, '-');
        return $this->articleRepository->createArticle([
            'id_user' => $request->id_user,
            'kode_article' => $kodeArticle,    
            'title' => $request->title,
            'article' => $request->article,
        ]);
    }

    public function updateArticle($id, ArticleRequest $request)
    {
        $kodeArticle = Str::slug($request->title, '-');
        return $this->articleRepository->updateArticle($id, [
            'id_user' => $request->id_user,
            'kode_article' => $kodeArticle,
            'title' => $request->title,
            'article' => $request->article,
            'status' => $request->status,
        ]);
    }

    public function deleteArticle($id)
    {
        return $this->articleRepository->deleteArticle($id);
    }

    public function getTrashedArticles()
    {
        return $this->articleRepository->getTrashedArticles();
    }

    public function restoreArticle($id)
    {
        return $this->articleRepository->restoreArticle($id);
    }

    public function destroyArticle($id)
    {
        return $this->articleRepository->destroyArticle($id);
    }
    
    // protected $userRepository;

    // public function __construct(UserRepositoryInterface $userRepository)
    // {
    //     $this->userRepository = $userRepository;
    // }
    // public function getAllUsers()
    // {
    //     return $this->userRepository->getAllUsers();
    // }

    // public function getUserById($id)
    // {
    //     return $this->userRepository->getUserById($id);
    // }

    // public function createUser(UserRequest $request)
    // {
    //     return $this->userRepository->createUser([
    //         'role_id' => $request->role_id,
    //         'email' => $request->email,
    //         'password' => $request->password,
    //         'name' => $request->name,
    //         'address' => $request->address,
    //         'phone_number' => $request->phone_number,
    //         'birth_date' => $request->birth_date,
    //         'gender' => $request->gender,
    //         'highest_education' => $request->highest_education
    //     ]);
    // }

    // public function updateUser($id, UserRequest $request)
    // {
    //     $data = $request->only([
    //         'role_id',
    //         'email',
    //         'name',
    //         'address',
    //         'phone_number',
    //         'birth_date',
    //         'gender',
    //         'highest_education',
    //     ]);

    //     if ($request->filled('password')) {
    //         $data['password'] = $request->password;
    //     }

    //     return $this->userRepository->updateUser($id, $data);
    // }
    // public function deleteUser($id)
    // {
    //     return $this->userRepository->deleteUser($id);
    // }

    // public function getTrashedUsers()
    // {
    //     return $this->userRepository->getTrashedUsers();
    // }

    // public function restoreUser($id)
    // {
    //     return $this->userRepository->restoreUser($id);
    // }

    // public function destroyUser($id)
    // {
    //     return $this->userRepository->destroyUser($id);
    // }
}


<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ArticleModel;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function getAllArticle(){
        $articles = ArticleModel::with(['user', 'topic_article', 'tag_article', 'like', 'comment', 'topic_article.topic', 'tag_article.tag'])
            ->where('status', 'approved')
            ->orderBy('date', 'desc')
            ->get();

        return response()->json($articles);
    }
}

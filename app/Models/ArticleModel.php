<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'article';
    protected $primaryKey = 'id_article';

    protected $fillable = ['id_user', 'kode', 'title', 'article', 'status', 'view'];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }

    public function status_changed_by()
    {
        return $this->belongsTo(UserModel::class, 'status_changed_by', 'id_user');
    }

    public function image()
    {
        return $this->hasMany(ImageModel::class, 'id_article', 'id_article');
    }

    public function tag_article()
    {
        return $this->hasMany(TagArticleModel::class, 'id_article', 'id_article');
    }

    public function topic()
    {
        return $this->hasOne(TopicModel::class, 'id_topic', 'id_topic');
    }

    public function like()
    {
        return $this->hasMany(LikeModel::class, 'id_article', 'id_article');
    }

    public function comment()
    {
        return $this->hasMany(CommentModel::class, 'id_article', 'id_article');
    }

    public function view()
    {
        return $this->hasMany(ViewModel::class, 'id_article', 'id_article');
    }
}

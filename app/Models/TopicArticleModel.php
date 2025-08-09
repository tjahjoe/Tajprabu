<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TopicArticleModel extends Model
{
    use HasFactory;

    protected $table = 'topic_article';

    protected $primaryKey = 'id_topic_article';

    protected $fillable = ['id_article', 'id_topic'];

    public function article(): BelongsTo
    {
        return $this->belongsTo(ArticleModel::class, 'id_article', 'id_article');
    }

    public function topic(): BelongsTo
    {
        return $this->belongsTo(TopicModel::class, 'id_topic', 'id_topic');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TagArticleModel extends Model
{
    use HasFactory;

    protected $table = 'tag_article';

    protected $primaryKey = 'id_tag_article';

    protected $fillable = ['id_article', 'id_tag'];

    public function article(): BelongsTo
    {
        return $this->belongsTo(ArticleModel::class, 'id_article', 'id_article');
    }

    public function tag(): BelongsTo
    {
        return $this->belongsTo(TagModel::class, 'id_tag', 'id_tag');
    }
}

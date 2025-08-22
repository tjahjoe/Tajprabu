<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LikeModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'like';

    protected $primaryKey = 'id_like';

    protected $fillable = ['id_article', 'id_user'];

    public function article(): BelongsTo
    {
        return $this->belongsTo(ArticleModel::class, 'id_article', 'id_article');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }
}

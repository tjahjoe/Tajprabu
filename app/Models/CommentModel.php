<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentModel extends Model
{
    use HasFactory;

    protected $table = 'comment';

    protected $primaryKey = 'id_comment';

    protected $fillable = ['id_article', 'id_user', 'id_parent', 'id_reply', 'comment'];

    public function article()
    {
        return $this->belongsTo(ArticleModel::class, 'id_article', 'id_article');
    }

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'id_parent', 'id_comment');
    }   
}

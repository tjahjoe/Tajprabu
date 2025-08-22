<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImageModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'image';

    protected $primaryKey = 'id_image';

    protected $fillable = ['id_article', 'path', 'description'];

    public function article()
    {
        return $this->belongsTo(ArticleModel::class, 'id_article', 'id_article');
    }
}

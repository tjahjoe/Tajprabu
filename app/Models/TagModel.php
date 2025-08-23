<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TagModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tag';
    protected $primaryKey = 'id_tag';
    protected $fillable = ['kode', 'tag'];

    public function tag_article(): HasMany
    {
        return $this->hasMany(TagArticleModel::class, 'id_tag', 'id_tag');
    }
}

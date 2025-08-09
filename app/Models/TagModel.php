<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TagModel extends Model
{
    use HasFactory;

    protected $table = 'tag';
    protected $primaryKey = 'id_tag';
    protected $fillable = ['tag'];

    public function article()
    {
        return $this->hasMany(TagArticleModel::class, 'id_tag', 'id_tag');
    }
}

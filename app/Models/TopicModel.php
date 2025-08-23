<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class TopicModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'topic';
    protected $primaryKey = 'id_topic';
    protected $fillable = ['kode', 'topic'];

    public function article()
    {
        return $this->hasMany(ArticleModel::class, 'id_topic', 'id_topic');
    }
}

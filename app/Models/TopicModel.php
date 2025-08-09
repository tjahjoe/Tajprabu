<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TopicModel extends Model
{
    use HasFactory;

    protected $table = 'topic';
    protected $primaryKey = 'id_topic';
    protected $fillable = ['topic'];

    public function article()
    {
        return $this->hasMany(TopicArticleModel::class, 'id_topic', 'id_topic');
    }
}

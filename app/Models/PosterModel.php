<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PosterModel extends Model
{
    use HasFactory;

    protected $table = 'poster';

    protected $primaryKey = 'id_poster';

    protected $fillable = ['id_user', 'path', 'status', 'date'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }
}

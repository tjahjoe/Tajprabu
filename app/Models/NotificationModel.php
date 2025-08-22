<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NotificationModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'notification';
    protected $primaryKey = 'id_notification';
    protected $fillable = ['id_user', 'title', 'description', 'status'];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'log';
    protected $primaryKey = 'id_log';
    protected $fillable = ['id_user', 'activity', 'description'];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'id_user', 'id_user');
    }
}

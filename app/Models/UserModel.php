<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tymon\JWTAuth\Contracts\JWTSubject;

class UserModel extends Authenticatable implements JWTSubject
{
    use HasFactory, SoftDeletes;

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $fillable = ['id_role','email', 'password', 'name', 'address', 'phone_number', 'birth_date', 'gender', 'highest_education', 'photo_path'];
    protected $hidden = ['password'];
    protected $casts = ['password' => 'hashed'];
    public function role(): BelongsTo
    {
        return $this->belongsTo(RoleModel::class, 'id_role', 'id_role');
    }

    public function has_role($kode): bool
    {
        return $this->role->kode == $kode;
    }

    public function article(): HasMany
    {
        return $this->hasMany(ArticleModel::class, 'id_user', 'id_user');
    }

    public function comment(): HasMany
    {
        return $this->hasMany(CommentModel::class, 'id_user', 'id_user');
    }

    public function like(): HasMany
    {
        return $this->hasMany(LikeModel::class, 'id_user', 'id_user');
    }

    public function view(): HasMany
    {
        return $this->hasMany(ViewModel::class, 'id_user', 'id_user');
    }

    public function poster(): HasMany
    {
        return $this->hasMany(PosterModel::class, 'id_user', 'id_user');
    }

    public function log(): HasMany
    {
        return $this->hasMany(LogModel::class, 'id_user', 'id_user');
    }

    public function notification(): HasMany
    {
        return $this->hasMany(NotificationModel::class, 'id_user', 'id_user');
    }
}

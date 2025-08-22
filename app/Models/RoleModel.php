<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'role';
    protected $primaryKey = 'id_role';
    protected $fillable = ['kode', 'role'];

    public function user()
    {
        return $this->hasMany(UserModel::class, 'id_role', 'id_role');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    // use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'user_name',
        'user_nim',
        'user_email',
        'user_password',
        'image',
        'role_id',
        
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

}

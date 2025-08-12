<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'dob', 'gender', 'profile_image', 'status'
    ];

    protected $hidden = [
        'password',
    ];
    public function blogs()
{
    return $this->hasMany(Blog::class);
}
}
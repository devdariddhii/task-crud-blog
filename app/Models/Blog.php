<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'description', 'images', 'tags', 'user_id', 'links'
    ];

    protected $casts = [
        'images' => 'array',
        'tags' => 'array',
        'links' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
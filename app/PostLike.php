<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostLike extends Model
{
    protected $table = 'like_post';

    public function post()
    {
        return $this->belongsTo(Post::class, 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}

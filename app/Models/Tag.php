<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tag', 'tag_id', 'post_id');
    }

    public function posts_polymorph()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function videos_polymorph()
    {
        return $this->morphedByMany(Video::class, 'taggable');
    }
}

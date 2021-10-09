<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(['name' => 'ANON']);
    }

    public function tags()
    {
        return $this
            ->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id')
            ->using(PostTag::class)
            ->withTimestamps()
            ->withPivot('status');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function comment()
    {
        return $this->morphOne(Comment::class, 'commentable');
    }

    public function tags_polymorph()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}

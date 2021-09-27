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
            ->withTimestamps()
            ->withPivot('status');
    }
}

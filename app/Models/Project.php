<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function tasks()
    {
        return $this->hasManyThrough(Task::class, User::class);
    }

    public function task()
    {
        return $this->hasOneThrough(Task::class, User::class);
    }
}

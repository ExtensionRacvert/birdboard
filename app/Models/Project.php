<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Project path
    public function path()
    {
        return "/projects/{$this->id}";
    }

    // Project owner relationship
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    // Project task relationship
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    // Owner adds a task to an existing project
    public function addTask($body)
    {
        return $this->tasks()->create(compact('body'));
    }
}

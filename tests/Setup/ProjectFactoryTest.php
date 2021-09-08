<?php

namespace Tests\Setup;

use Tests\TestCase;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;

class ProjectFactoryTest
{
    protected $tasksCount = 0;
    
    protected $user;

    public function withTasks($count)
    {
        $this->tasksCount = $count;

        return $this;
    }
    
    public function ownedBy($user)
    {
        $this->user = $user;

        return $this;
    }
    
    public static function create()
    {
        $project = factory(Project::class)->create([
            'owner_id' => $this->user ?? factory(User::class)
        ]);

        factory(Task::class, $this->tasksCount)->create([
            'project_id' => $project
        ]);

        return $project;
    }
}
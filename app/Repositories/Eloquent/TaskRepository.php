<?php

namespace App\Repositories\Eloquent;

use App\Models\Task;
use App\Repositories\Interfaces\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface
{
    public function create(array $data)
    {
        return Task::create($data);
    }

    public function updateStatus($id, string $status)
    {
        $task = Task::findOrFail($id);
        $task->status = $status;
        $task->save();

        return $task;
    }

    public function getByProjectId(int $projectId)
    {
        return Task::where('project_id', $projectId)->get();
    }
}

<?php

namespace App\Repositories\Eloquent;

use App\Models\Project;
use App\Repositories\Interfaces\ProjectRepositoryInterface;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function getByUser($userId)
    {
        return Project::where('user_id', $userId)->get();
    }

    public function find($id)
    {
        return Project::findOrFail($id);
    }

    public function create(array $data)
    {
        return Project::create($data);
    }
}

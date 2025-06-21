<?php

namespace App\Services\Implementations;

use App\Repositories\Interfaces\TaskRepositoryInterface;
use App\Services\Interfaces\TaskServiceInterface;

class TaskService implements TaskServiceInterface
{
    public function __construct(protected TaskRepositoryInterface $taskRepo) {}

    public function create(array $data)
    {
        return $this->taskRepo->create($data);
    }

    public function updateStatus($id, string $status)
    {
        return $this->taskRepo->updateStatus($id, $status);
    }

    public function getByProjectId(int $projectId)
    {
        return $this->taskRepo->getByProjectId($projectId);
    }
}

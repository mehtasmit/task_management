<?php

namespace App\Services\Interfaces;

interface TaskServiceInterface
{
    public function create(array $data);

    public function updateStatus($id, string $status);

    public function getByProjectId(int $projectId);
}

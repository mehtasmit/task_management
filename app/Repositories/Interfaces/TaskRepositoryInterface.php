<?php

namespace App\Repositories\Interfaces;

interface TaskRepositoryInterface
{
    public function create(array $data);

    public function updateStatus($id, string $status);

    public function getByProjectId(int $projectId);
}

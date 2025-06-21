<?php

namespace App\Services\Implementations;

use App\Repositories\Interfaces\ProjectRepositoryInterface;
use App\Services\Interfaces\ProjectServiceInterface;

class ProjectService implements ProjectServiceInterface
{
    public function __construct(protected ProjectRepositoryInterface $projectRepo) {}

    public function listUserProjects($userId)
    {
        return $this->projectRepo->getByUser($userId);
    }

    public function getById($id)
    {
        return $this->projectRepo->find($id);
    }

    public function create(array $data)
    {
        return $this->projectRepo->create($data);
    }
}

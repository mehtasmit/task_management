<?php

namespace App\Services\Interfaces;

interface ProjectServiceInterface
{
    public function listUserProjects($userId);

    public function getById($id);

    public function create(array $data);
}

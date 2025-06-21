<?php

namespace App\Repositories\Interfaces;

interface ProjectRepositoryInterface
{
    public function getByUser($userId);

    public function find($id);

    public function create(array $data);
}

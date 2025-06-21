<?php

namespace App\Services\Implementations;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;

class UserService implements UserServiceInterface
{
    public function __construct(private UserRepositoryInterface $repo) {}

    public function getAll()
    {
        return $this->repo->all();
    }

    public function getById($id)
    {
        return $this->repo->find($id);
    }

    public function create(array $data)
    {
        return $this->repo->create($data);
    }

    public function update($id, array $data)
    {
        return $this->repo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->repo->delete($id);
    }
}

<?php

namespace App\Repositories;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param User $model
     */
    public function __construct(
        protected User $model
    ) {}

    /**
     * {@inheritDoc}
     */
    public function create(array $data): User
    {
        return $this->model->create($data);
    }

    /**
     * {@inheritDoc}
     */
    public function findById(int $id): ?User
    {
        return $this->model->find($id);
    }

    /**
     * {@inheritDoc}
     */
    public function update(int $id, array $data): bool
    {
        $user = $this->findById($id);

        if (!$user) {
            return false;
        }

        return $user->update($data);
    }

    /**
     * {@inheritDoc}
     */
    public function delete(int $id): bool
    {
        $user = $this->findById($id);

        if (!$user) {
            return false;
        }

        return $user->delete();
    }
}

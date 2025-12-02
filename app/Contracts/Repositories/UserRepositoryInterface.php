<?php

namespace App\Contracts\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{
    /**
     * @param int $id
     * @return User|null
     */
    public function findById(int $id): ?User;


    /**
     * @param array $data
     * @return User
     */
    public function create(array $data): User;

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}

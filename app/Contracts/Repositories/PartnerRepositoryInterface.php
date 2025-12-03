<?php

namespace App\Contracts\Repositories;

use App\Models\Partner;

interface PartnerRepositoryInterface
{
    /**
     * @param int $id
     * @return Partner|null
     */
    public function findById(int $id): ?Partner;


    /**
     * @param array $data
     * @return Partner
     */
    public function create(array $data): Partner;

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

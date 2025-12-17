<?php

namespace App\Contracts\Repositories;

use App\Entities\Partner;

interface PartnerRepositoryInterface
{
    /**
     * @param string $id
     * @return Partner
     */
    public function findById(string $id): Partner;


    /**
     * @param array $data
     * @return Partner
     */
    public function create(array $data): Partner;
}

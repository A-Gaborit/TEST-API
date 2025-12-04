<?php

namespace App\Contracts\Services;

use App\Entities\Partner;

interface PartnerServiceInterface
{
    /**
     * @param array $data
     * @return Partner
     */
    public function create(array $data): Partner;

    /**
     * @param string $partnerId
     * @return array
     */
    public function assignUserToPartner(string $partnerId): array;
}

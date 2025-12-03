<?php

namespace App\Contracts\Services;

use App\Models\Partner;
use App\Http\Requests\StorePartnerRequest;

interface PartnerServiceInterface
{
    /**
     * @param array $data
     * @return \App\Models\Partner
     */
    public function create(array $data);

    /**
     * @param string $partnerId
     * @return array
     */
    public function assignUserToPartner(string $partnerId): array;
}

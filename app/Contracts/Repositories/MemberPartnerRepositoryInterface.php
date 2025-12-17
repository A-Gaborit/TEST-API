<?php

namespace App\Contracts\Repositories;

use App\Entities\MemberPartner;

interface MemberPartnerRepositoryInterface
{
    /**
     * @param array $data
     * @return MemberPartner
     */
    public function create(array $data): MemberPartner;
}

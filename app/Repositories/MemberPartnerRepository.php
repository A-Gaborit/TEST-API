<?php

namespace App\Repositories;

use App\Contracts\Repositories\MemberPartnerRepositoryInterface;
use App\Models\MemberPartner as MemberPartnerModel;
use App\Entities\MemberPartner as MemberPartnerEntity;

class MemberPartnerRepository implements MemberPartnerRepositoryInterface
{
    /**
     * @param MemberPartnerModel $model
     */
    public function __construct(
        protected MemberPartnerModel $model
    ) {}

    /**
     * {@inheritDoc}
     */ 
    public function create(array $data): MemberPartnerEntity
    {
        if (
            isset($data['partner_id'], $data['user_id']) &&
            $this->model->where('partner_id', $data['partner_id'])
                ->where('user_id', $data['user_id'])
                ->exists()
        ) {
            throw new \InvalidArgumentException('Vous êtes déjà membre de ce partenaire.');
        }

        $partnerModel = $this->model->create($data);

        return $this->mapModelToEntity($partnerModel);
    }

    protected function mapModelToEntity(MemberPartnerModel $model): MemberPartnerEntity
    {
        return new MemberPartnerEntity(
            id: (string) $model->id,
            userId: $model->user_id,
            partnerId: $model->partner_id,
            role: $model->role,
        );
    }
}

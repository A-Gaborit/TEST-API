<?php

namespace App\Repositories;

use App\Contracts\Repositories\PartnerRepositoryInterface;
use App\Models\Partner as PartnerModel;
use App\Entities\Partner as PartnerEntity;

class PartnerRepository implements PartnerRepositoryInterface
{
    /**
     * @param PartnerModel $model
     */
    public function __construct(
        protected PartnerModel $model
    ) {}

    /**
     * {@inheritDoc}
     */
    public function findById(string $id): PartnerEntity
    {
        $partnerModel = $this->model->findOrFail($id); 

        return $this->mapModelToEntity($partnerModel);
    }

    /**
     * {@inheritDoc}
     */
    public function create(array $data): PartnerEntity
    {
        $partnerModel = $this->model->create($data);

        return $this->mapModelToEntity($partnerModel);
    }

    protected function mapModelToEntity(PartnerModel $model): PartnerEntity
    {
        return new PartnerEntity(
            id: (string) $model->id,
            companyName: $model->company_name,
            contactEmail: $model->contact_email,
            contactPhone: $model->contact_phone,
            website: $model->website,
            logoPath: $model->logo_path,
        );
    }
}
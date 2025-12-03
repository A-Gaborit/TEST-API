<?php

namespace App\Repositories;

use App\Contracts\Repositories\PartnerRepositoryInterface;
use App\Models\Partner;
use Illuminate\Support\Facades\Hash;

class PartnerRepository implements PartnerRepositoryInterface
{
    /**
     * @param Partner $model
     */
    public function __construct(
        protected Partner $model
    ) {}

    /**
     * {@inheritDoc}
     */
    public function create(array $data): Partner
    {
        return $this->model->create($data);
    }

    /**
     * {@inheritDoc}
     */
    public function findById(int $id): ?Partner
    {
        return $this->model->findOrFail($id);
    }

    /**
     * {@inheritDoc}
     */
    public function update(int $id, array $data): bool
    {
        $partner = $this->findById($id);

        return $partner->update($data);
    }

    /**
     * {@inheritDoc}
     */
    public function delete(int $id): bool
    {
        $partner = $this->findById($id);

        return $partner->delete();
    }
}

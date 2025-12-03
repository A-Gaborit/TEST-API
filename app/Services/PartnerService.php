<?php

namespace App\Services;

use App\Contracts\Repositories\PartnerRepositoryInterface;
use App\Contracts\Services\PartnerServiceInterface;
use App\Models\MemberPartner;
use Illuminate\Support\Facades\Auth;

class PartnerService implements PartnerServiceInterface
{
    /**
     * @param PartnerRepositoryInterface $partnerRepository
     */
    public function __construct(
        protected PartnerRepositoryInterface $partnerRepository
    ) {}

    /**
     * {@inheritDoc}
     */
    public function create(array $data)
    {
        $partner = $this->partnerRepository->create($data);

        MemberPartner::create([
            'partner_id' => $partner->id,
            'user_id' => auth()->user()->id,
            'role' => 'owner',
        ]);

        return $partner;
    }

    /**
     * {@inheritDoc}
     */
    public function assignUserToPartner(string $partnerId): array
    {
        $partner = $this->partnerRepository->findById($partnerId);

        MemberPartner::create([
            'partner_id' => $partner->id,
            'user_id' => auth()->user()->id,
        ]);

        return [
            'message' => 'Vous avez été ajouté au partenaire avec succès'
        ];
    }
}